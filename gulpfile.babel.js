/* eslint-env es6 */
'use strict';

/**
 * To start theme building process, define the theme name below,
 * then run "gulp" in command line.
 */

import gulp from 'gulp';
import autoprefixer from 'autoprefixer';
import browserSync from 'browser-sync';
import cssnano from 'gulp-cssnano';
import babel from 'gulp-babel';
import eslint from 'gulp-eslint';
import log from 'fancy-log';
import gulpif from 'gulp-if';
import image from 'gulp-image';
import newer from 'gulp-newer';
import partialImport from 'postcss-partial-import';
import postcssPresetEnv from 'postcss-preset-env';
import phpcs from 'gulp-phpcs';
import postcss from 'gulp-postcss';
import print from 'gulp-print'; // show filenames as they are being processed.
import replace from 'gulp-string-replace'; // replaces 'WP Rig' and 'wprig' with 'JS 19' and 'js19'.
import requireUncached from 'require-uncached';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import sort from 'gulp-sort';
import tabify from 'gulp-tabify';
import uglify from 'gulp-uglify';
import wppot from 'gulp-wp-pot';
import zip from 'gulp-zip';

// Import theme-specific configurations.
var config = require('./dev/config/themeConfig.js');
var themeConfig = config.theme;
themeConfig.isFirstRun = true;

// Project paths
const paths = {
  config: {
    cssVars: './dev/config/cssVariables.json',
    themeConfig: './dev/config/themeConfig.js'
  },
  php: {
    src: ['dev/**/*.php', '!dev/optional/**/*.*'],
    dest: './'
  },
  styles: {
	src: [
		'dev/**/*.css',
		'!dev/optional/**/*.*',
		'!dev/css/partials/**',
		'!dev/css/partials/*.*',
		'!dev/css/partials',
		'!dev/css/admin.css',
    '!dev/css/content.css',
    '!dev/css/login.css',
		'!dev/style.css',
		'!dev/css/editor-styles.css',
		'!dev/css/sidebar.css',
		'!dev/pluggable/cardexpansion/css/*.css',
    'dev/pluggable/cardexpansion/css/demo.css',
    'dev/css/**/*.scss',
    'dev/css/partials/additional_styles.css'
  ],
    dev: './',
    dest: './',
    sass: ['dev/css/partials/additional_styles.scss']
  },
  scripts: {
    src: ['dev/**/*.js', '!dev/**/*.min.js', '!dev/js/libs/**/*.js', '!dev/optional/**/*.*', '!dev/config/**/*'],
    min: 'dev/**/*.min.js',
    dest: './',
    libs: 'dev/js/libs/**/*.js',
    libsDest: './js/libs/',
    verboseLibsDest: './verbose/js/libs/'
  },
  images: {
    src: ['dev/**/*.{jpg,JPG,png,svg,gif,GIF}', '!dev/optional/**/*.*'],
    dest: './'
  },
  languages: {
    src: ['./**/*.php', '!dev/**/*.php', '!verbose/**/*.php'],
    dest: './languages/' + config.theme.slug + '.pot'
  },
  verbose: './verbose/',
  export: {
    src: ['**/*', '!' + config.theme.slug, '!' + config.theme.slug + '/**/*', '!dev/**/*', '!node_modules', '!node_modules/**/*', '!vendor', '!vendor/**/*', '!.*', '!composer.*', '!gulpfile.*', '!package*.*', '!phpcs.*', '!*.zip'],
    dest: './'
  }
};

/**
 * Conditionally set up BrowserSync.
 * Only run BrowserSync if config.browserSync.live = true.
 */

// Create a BrowserSync instance:
const server = browserSync.create();

// Initialize the BrowserSync server conditionally:
function serve(done) {
  if (config.dev.browserSync.live) {
    server.init({
      proxy: config.dev.browserSync.proxyURL,
      port: config.dev.browserSync.bypassPort,
      liveReload: true
    });
  }
  done();
}

// Reload the live site:
function reload(done) {
  config = requireUncached('./dev/config/themeConfig.js');
  if (config.dev.browserSync.live) {
    if (server.paused) {
      server.resume();
    }
    server.reload();
  } else {
    server.pause();
  }
  done();
}


/**
 * PHP via PHP Code Sniffer.
 */
export function php() {
  config = requireUncached('./dev/config/themeConfig.js');
  // Check if theme slug has been updated.
  let isRebuild = themeConfig.isFirstRun ||
    (themeConfig.slug !== config.theme.slug) ||
    (themeConfig.name !== config.theme.name);
  if (isRebuild) {
    themeConfig.slug = config.theme.slug;
    themeConfig.name = config.theme.name;
  }

  // Reset first run.
  if (themeConfig.isFirstRun) {
    themeConfig.isFirstRun = false;
  }

  return gulp.src(paths.php.src)
    // If not a rebuild, then run tasks on changed files only.
    // .pipe(gulpif(!isRebuild, newer(paths.php.dest)))
    // .pipe(phpcs({
    // 	bin: 'vendor/bin/phpcs',
    // 	standard: 'WordPress',
    // 	warningSeverity: 0
    // }))
    // Log all problems that were found.
    // .pipe(phpcs.reporter('log'))
    // .pipe(replace('wprig', config.theme.slug))
    // .pipe(replace('WP Rig', config.theme.name))
    .pipe(gulp.dest(paths.php.dest));

}

/**
 * Sass, if that's being used.
 */

let sassOptions = {
  outputStyle: 'compressed',
  indentType: 'tab',
  indentWidth: 1,
};
// export function sassStyles() {
// 	console.log(`src was ${paths.styles.sass.src}`)
// 	return gulp.src("dev/css/partials/additional_styles.scss")
// 	.pipe(print())
// 	.pipe(sass(sassOptions).on('error', sass.logError))
// 	.pipe(gulp.dest("css/"))
// 	.pipe(gulp.dest("dev/css/"));
// }

/**
 * Sass, if that's being used.
 */
export function sassStyles() {

	// const output = process.cwd();
	// console.log(`***** output dir is ${output} *****`);
//   return gulp.src(paths.styles.sass, {
  // return gulp.src(paths.styles.sass, {base: 'dev/css/partials/'}) // take only the additional styles file
  return gulp.src(paths.styles.sass, {base: 'dev/css/partials/', sourcemaps: true}) // take only the additional styles file
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(tabify(2, true))
    // .pipe(sourcemaps.write('./')) // will output to a file called within the non-dev version
    .pipe(gulp.dest(paths.styles.dev, { sourcemaps: true }));
}

/**
 * CSS via PostCSS + CSSNext (includes Autoprefixer by default).
 */
export function styles() {
  config = requireUncached('./dev/config/themeConfig.js');

  // Reload cssVars every time the task runs.
  let cssVars = requireUncached(paths.config.cssVars)

  return gulp.src(paths.styles.src)
    .pipe(print())
    // .pipe(phpcs({
    //   bin: 'vendor/bin/phpcs',
    //   standard: 'WordPress',
    //   warningSeverity: 0
    // }))
    // Log all problems that was found
    .pipe(phpcs.reporter('log'))
    .pipe(postcss([
      postcssPresetEnv({
        stage: 0,
        browsers: config.dev.browserslist,
        features: {
          'custom-properties': {
            preserve: false,
            variables: cssVars.variables,
          },
          'custom-media-queries': {
            preserve: false,
            extensions: cssVars.queries,
          }
        }
      })
    ]))
    .pipe(replace('wprig', config.theme.slug))
    .pipe(replace('WP Rig', config.theme.name))
    .pipe(gulp.dest(paths.verbose))
    .pipe(gulpif(!config.dev.debug.styles, cssnano()))
    .pipe(gulp.dest(paths.styles.dest));
}


/**
 * JavaScript via Babel, ESlint, and uglify.
 */
export function scripts() {
  config = requireUncached('./dev/config/themeConfig.js');
  return gulp.src(paths.scripts.src)
    .pipe(newer(paths.scripts.dest))
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(babel())
    .pipe(gulp.dest(paths.verbose))
    .pipe(gulpif(!config.dev.debug.scripts, uglify()))
    // .pipe(replace('wprig', config.theme.slug))
    // .pipe(replace('WP Rig', config.theme.name))
    .pipe(gulp.dest(paths.scripts.dest));
}


/**
 * Copy JS libraries without touching them.
 */
export function jsLibs() {
  return gulp.src(paths.scripts.libs)
    .pipe(newer(paths.scripts.verboseLibsDest))
    .pipe(gulp.dest(paths.scripts.verboseLibsDest))
    .pipe(gulp.dest(paths.scripts.libsDest));
}


/**
 * Copy minified JS files without touching them.
 */
export function jsMin() {
  return gulp.src(paths.scripts.min)
    .pipe(newer(paths.scripts.dest))
    .pipe(gulp.dest(paths.verbose))
    .pipe(gulp.dest(paths.scripts.dest));
}

/**
 * Optimize images.
 */
export function images() {
  return gulp.src(paths.images.src)
    .pipe(newer(paths.images.dest))
    .pipe(image())
    .pipe(gulp.dest(paths.images.dest));
}


/**
 * Watch everything
 */
export function watch() {
  gulp.watch(paths.php.src, gulp.series(php, reload));
  gulp.watch(paths.config.themeConfig, gulp.series(php, reload));
  gulp.watch(paths.config.cssVars, gulp.series(styles, reload));
  gulp.watch('dev/css/partials/*.scss', sassStyles);
  // gulp.watch(paths.styles.src, gulp.series(styles, reload));
  gulp.watch(paths.styles.src, gulp.series(styles, reload));
  gulp.watch(paths.scripts.src, gulp.series(scripts, reload));
  gulp.watch(paths.scripts.min, gulp.series(jsMin, reload));
  gulp.watch(paths.scripts.libs, gulp.series(jsLibs, reload));
  gulp.watch(paths.images.src, gulp.series(images, reload));
}


/**
 * Map out the sequence of events on first load:
 */
const firstRun = gulp.series(php, gulp.parallel(scripts, jsMin, jsLibs), styles, images, serve, watch);


/**
 * Run the whole thing.
 */
export default firstRun;

const justServe = gulp.series(serve, watch);

/**
 * Generate translation files.
 */
export function translate() {
  return gulp.src(paths.languages.src)
    .pipe(sort())
    .pipe(wppot({
      domain: config.theme.slug,
      package: config.theme.name,
      bugReport: config.theme.name,
      lastTranslator: config.theme.author
    }))
    .pipe(gulp.dest(paths.languages.dest));
}


/**
 * Create zip archive from generated theme files.
 */
export function bundle() {
  return gulp.src(paths.export.src)
    .pipe(print())
    .pipe(gulpif(config.export.compress, zip(config.theme.slug + '.zip'), gulp.dest(paths.export.dest + config.theme.slug)))
    .pipe(gulpif(config.export.compress, gulp.dest(paths.export.dest)));
}


/**
 * Test the theme.
 */
const testTheme = gulp.series(php);


/**
 * Export theme for distribution.
 */
const bundleTheme = gulp.series(testTheme, gulp.parallel(scripts, jsMin, jsLibs), styles, images, translate, bundle);

export {
  testTheme,
  bundleTheme,
  justServe
};
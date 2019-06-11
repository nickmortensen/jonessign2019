<?php
/**
 * WP Rig functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wprig
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wprig_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wprig, use a find and replace
		* to change 'wprig' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wprig', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'wprig' ),
			'better'  => esc_html__( 'Better Menu', 'wprig' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wprig_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	/**
	 * Add support for default block styles.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#default-block-styles
	 */
	add_theme_support( 'wp-block-styles' );
	/**
	 * Add support for wide aligments.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add support for block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-color-palettes
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Dusty orange', 'wprig' ),
				'slug'  => 'dusty-orange',
				'color' => '#ed8f5b',
			),
			array(
				'name'  => __( 'Dusty red', 'wprig' ),
				'slug'  => 'dusty-red',
				'color' => '#e36d60',
			),
			array(
				'name'  => __( 'Dusty wine', 'wprig' ),
				'slug'  => 'dusty-wine',
				'color' => '#9c4368',
			),
			array(
				'name'  => __( 'Dark sunset', 'wprig' ),
				'slug'  => 'dark-sunset',
				'color' => '#33223b',
			),
			array(
				'name'  => __( 'Almost black', 'wprig' ),
				'slug'  => 'almost-black',
				'color' => '#0a1c28',
			),
			array(
				'name'  => __( 'Dusty water', 'wprig' ),
				'slug'  => 'dusty-water',
				'color' => '#41848f',
			),
			array(
				'name'  => __( 'Dusty sky', 'wprig' ),
				'slug'  => 'dusty-sky',
				'color' => '#72a7a3',
			),
			array(
				'name'  => __( 'Dusty daylight', 'wprig' ),
				'slug'  => 'dusty-daylight',
				'color' => '#97c0b7',
			),
			array(
				'name'  => __( 'Dusty sun', 'wprig' ),
				'slug'  => 'dusty-sun',
				'color' => '#eee9d1',
			),
		)
	);

	/**
	 * Optional: Disable custom colors in block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 *
	 * add_theme_support( 'disable-custom-colors' );
	 */

	/**
	 * Add support for font sizes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'small', 'wprig' ),
				'shortName' => __( 'S', 'wprig' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'regular', 'wprig' ),
				'shortName' => __( 'M', 'wprig' ),
				'size'      => 20,
				'slug'      => 'regular',
			),
			array(
				'name'      => __( 'large', 'wprig' ),
				'shortName' => __( 'L', 'wprig' ),
				'size'      => 36,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'larger', 'wprig' ),
				'shortName' => __( 'XL', 'wprig' ),
				'size'      => 48,
				'slug'      => 'larger',
			),
		)
	);

	/**
	 * Optional: Add AMP support.
	 *
	 * Add built-in support for the AMP plugin and specific AMP features.
	 * Control how the plugin, when activated, impacts the theme.
	 *
	 * @link https://wordpress.org/plugins/amp/
	 */
	add_theme_support(
		'amp',
		array(
			'comments_live_list' => true,
		)
	);

}
add_action( 'after_setup_theme', 'wprig_setup' );

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function wprig_embed_dimensions( array $dimensions ) {
	$dimensions['width'] = 720;
	return $dimensions;
}
add_filter( 'embed_defaults', 'wprig_embed_dimensions' );

/**
 * Register Google Fonts
 */
function wprig_fonts_url() {
	$fonts_url = '';

	/**
	 * Translator: If Roboto Sans does not support characters in your language, translate this to 'off'.
	 */
	$roboto = esc_html_x( 'on', 'Roboto Condensed font: on or off', 'wprig' );
	/**
	 * Translator: If Crimson Text does not support characters in your language, translate this to 'off'.
	 */
	$montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'wprig' );

	$font_families = array();

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:400, 400i, 700, 700i';
	}

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:500, 500i, 700, 700i';
	}

	if ( in_array( 'on', array( $roboto, $montserrat ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}
/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function wprig_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'wprig-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'wprig_resource_hints', 10, 2 );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function wprig_gutenberg_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_theme_file_uri( '/css/editor-styles.css' ), array(), '20180514' );
}
add_action( 'enqueue_block_editor_assets', 'wprig_gutenberg_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wprig_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wprig' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wprig' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wprig_widgets_init' );

/**
 * Enqueue styles.
 */
function wprig_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_stylesheet_uri(), array(), '20180514' );
	wp_enqueue_style( 'wprig-side-menu', get_theme_file_uri( '/css/side_menu.css' ), array( 'wprig-base-style' ), '20180514' );
	wp_enqueue_style( 'wprig-scss', get_theme_file_uri( '/css/additional_styles.css' ), array( 'wprig-base-style' ), '20180527' );
	// font awesome is for dmoing card expansion effects!
	wp_enqueue_style( 'wprig-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css', array( 'wprig-base-style' ), '20180527' );
	wp_enqueue_style( 'wprig-expansion-demo', get_theme_file_uri( '/pluggable/cardexpansion/css/demo.css' ), array( 'wprig-base-style' ), '20180527' );
	wp_enqueue_style( 'wprig-expansion-demo-card', get_theme_file_uri( '/pluggable/cardexpansion/css/card.css' ), array( 'wprig-expansion-demo' ), '20180527' );
	wp_enqueue_style( 'wprig-expansion-demo-pattern', get_theme_file_uri( '/pluggable/cardexpansion/css/pattern.css' ), array( 'wprig-expansion-demo-card' ), '20180527' );

	// Register component styles that are printed as needed.
	wp_register_style( 'wprig-content', get_theme_file_uri( '/css/content.css' ), array(), '20180514' );
	wp_register_style( 'wprig-sidebar', get_theme_file_uri( '/css/sidebar.css' ), array(), '20180514' );
	wp_register_style( 'wprig-widgets', get_theme_file_uri( '/css/widgets.css' ), array(), '20180514' );
	wp_register_style( 'wprig-front-page', get_theme_file_uri( '/css/front-page.css' ), array(), '20180514' );
}
add_action( 'wp_enqueue_scripts', 'wprig_styles' );

/**
 * Only enqueue these particular javascript files for the front-page of the website.
 */
function conditional_scripts() {
	if ( is_page( 2 ) ) {
		wp_enqueue_script( 'splittext', '//s3-us-west-2.amazonaws.com/s.cdpn.io/16327/SplitText.min.js', array(), '20190514', false );
		wp_enqueue_script( 'tweenmax', '//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array( 'splittext' ), '20190514', false );
		wp_script_add_data( 'tweenmax', 'defer', false );
	}
}

add_action( 'wp_enqueue_scripts', 'conditional_scripts' );
/**
 * Enqueue scripts.
 */
function wprig_scripts() {

	// If the AMP plugin is active, return early.
	if ( wprig_is_amp() ) {
		return;
	}

}
add_action( 'wp_enqueue_scripts', 'wprig_scripts' );

/**
 * Custom side menu.
 */
require get_template_directory() . '/inc/class-side-walker-nav-menu.php';
/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom stylesheets only in admin or on login pages.
 */
require get_template_directory() . '/inc/custom-admin-styles.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
require get_template_directory() . '/pluggable/lazyload/lazyload.php';

/**
 * Output data nicely for debugging.
 *
 * @param string $data The data I'd like to print out $ Debug.
 * @return void
 */
function pr( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

$about_us_copy = 'Since 1910, Jones Sign Company has provided industry-leading design, manufacturing, installation, & maintenance of signage, lighting, & architectural elements to construction companies, design firms, national brands, & local clientele.';

/**
 * Dequeue the emoji that come along with WordPress.
 */
require get_template_directory() . '/inc/disable-emoji.php';

/**
 * Get the rich snippets for all locations on the home page.
 */
require get_template_directory() . '/inc/locations-rich-snippet-all.php';


/**
 * Import the function add_single_location_rich_snippet() from get_template_directory() . '/inc/locations-rich-snippet-single.php'.
 */
require get_template_directory() . '/inc/locations-rich-snippet-single.php';
/**
 * Only instantiate the function on 'location' taxonomy pages.
 */
function output_location_snippet() {
	if ( is_tax( 'location' ) ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo add_single_location_rich_snippet();
	}
}
add_action( 'wp_head', 'output_location_snippet', 9 );

/**
 * Contains the function to get available openeings at that specific location.
 */
require get_template_directory() . '/inc/currently-available-positions-at-this-location.php';

$html_whitelist = array(
	'a'       => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'      => array(),
	'em'      => array(),
	'strong'  => array(),
	'section' => array(
		'class' => true,
		'id'    => true,
	),
	'input'   => array(
		'class' => true,
		'id'    => true,
		'name'  => true,
	),
	'label'   => array(
		'class' => true,
		'id'    => true,
	),
	'option'  => array(
		'class'    => true,
		'id'       => true,
		'selected' => true,
		'disabled' => true,
	),
	'select'  => array(
		'class' => true,
		'id'    => true,
		'name'  => true,
	),
	'div'     => array(
		'class' => true,
		'id'    => true,
	),
);


/**
 * Add these scripts to the footer.
 *
 * @link https://tympanus.net/codrops/2015/06/18/card-expansion-effect-svg-clippath/.
 */
function add_these_scripts_in_footer() {
	wp_enqueue_script( 'wprig-trianglify', get_theme_file_uri( 'pluggable/cardexpansion/js/vendors/trianglify.min.js' ), array(), '20180514', false );
	wp_script_add_data( 'wprig-trianglify', 'async', true );
	wp_enqueue_script( 'wprig-tmax', get_theme_file_uri( 'pluggable/cardexpansion/js/vendors/TweenMax.min.js' ), array( 'wprig-trianglify' ), '20180514', false );
	wp_script_add_data( 'wprig-tmax', 'async', true );
	wp_enqueue_script( 'wprig-scroll-to-top', get_theme_file_uri( 'pluggable/cardexpansion/js/vendors/ScrollToPlugin.min.js' ), array( 'wprig-tmax' ), '20180514', false );
	wp_script_add_data( 'wprig-scroll-to-top', 'async', true );
	wp_enqueue_script( 'wprig-cash', get_theme_file_uri( 'pluggable/cardexpansion/js/vendors/cash.min.js' ), array( 'wprig-scroll-to-top' ), '20180514', false );
	wp_script_add_data( 'wprig-cash', 'async', true );
	wp_enqueue_script( 'wprig-card-circle', get_theme_file_uri( 'pluggable/cardexpansion/js/Card-circle.js' ), array( 'wprig-cash' ), '20180514', false );
	wp_script_add_data( 'wprig-card-circle', 'async', true );
	wp_enqueue_script( 'wprig-demo', get_theme_file_uri( 'pluggable/cardexpansion/js/demo.js' ), array( 'wprig-card-circle' ), '20180514', false );
	wp_script_add_data( 'wprig-demo', 'async', true );
}

add_action( 'wp_footer', 'add_these_scripts_in_footer' );

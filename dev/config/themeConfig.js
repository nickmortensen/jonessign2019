'use strict';

module.exports = {
  theme: {
    slug: 'js19',
    name: 'Jones Sign',
    author: 'nick mortensen'
  },
  dev: {
    browserSync: {
      live: true,
      proxyURL: 'https://jonessign.co',
      bypassPort: '3057',
      https: {
        key: '~/ssl/jonessign.co.key',
        cert: '~/ssl/jonessign.co.crt'
      }
    },
    browserslist: [ // See https://github.com/browserslist/browserslist
      '> 1%',
      'last 2 versions'
    ],
    debug: {
      styles: true, // Render verbose CSS for debugging.
      scripts: false // Render verbose JS for debugging.
    }
  },
  export: {
    compress: true
  }
};

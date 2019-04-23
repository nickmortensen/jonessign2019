'use strict';

module.exports = {
	theme: {
		slug: 'jones2019',
		name: 'Jones Sign 2019',
		author: 'Nick Mortensen'
	},
	dev: {
		browserSync: {
			live: true,
			proxyURL: 'https://jonessign.co',
			bypassPort: '5097',
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
			styles: false, // Render verbose CSS for debugging.
			scripts: false // Render verbose JS for debugging.
		}
	},
	export: {
		compress: true
	}
};

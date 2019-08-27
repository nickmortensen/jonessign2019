<?php
/**
 * WP Rig functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_rig
 */

define( 'WP_RIG_MINIMUM_WP_VERSION', '4.5' );
define( 'WP_RIG_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], WP_RIG_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), WP_RIG_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function _wp_rig_autoload( $class_name ) {
		$namespace = 'WP_Rig\WP_Rig';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( '_wp_rig_autoload' );
}

// Load the `wp_rig()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'WP_Rig\WP_Rig\wp_rig' );

/**
 * Outputs raw data inside of <pre> tags.
 *
 * @param array $content The data to place inside of the '<pre>' tag.
 */
function pr( $content ) {
	echo '<pre>';
	print_r( $content );
	echo '</pre>';
}
/**
 * Output this data inside of a '<span>' tag.
 *
 * @param string $information The information to surround with a span tag.
 * @param array $attributes An array of attributes to go inside of the span tag.
 */
function output_inside_span( $information, $attributes = [] ) {
	$output = '<span';
	if ( !empty( $attributes ) ) {
		foreach ($attributes as $attribute => $value) {
			$output .= ' ' . $attribute . '="' . $value . '"';
		}
	}
	$output .= '>';
	$output .= $information;
	$output .= '</span>';
	return $output;
}
if ( ! function_exists( 'get_attachment_info' ) ) {
	/**
	 * Output data about an image for use in alt tags, etc.
	 *
	 * @param integer $attachment_id The post_id of the image we want information about.
	 *
	 * @return array An array with the alt, caption, description, href, src, title of the image.
	 */
	function get_attachment_info( $attachment_id ) {
		$attachment            = get_post( $attachment_id );
		$output                = [];
		$output['alt']         = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
		$output['caption']     = ucfirst( $attachment->post_excerpt );
		$output['description'] = ucfirst( $attachment->post_content );
		$output['href']        = get_permalink( $attachment->ID );
		$output['src']         = $attachment->guid;
		$output['title']       = $attachment->post_title;
		return $output;
	}
}

/**
 * Initial way of putting the js for googlemaps into a page
 */
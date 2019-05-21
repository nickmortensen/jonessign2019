<?php
/**
 * Displacement Grid Functions
 *
 * @package js19
 */

/**
 * Echo out the escaped url of the grid image.
 *
 * @param [integer] $data The number of the image.
 */
function grid_image( $data ) {
	$output = get_theme_file_uri() . '/images/img/Img' . $data . '.jpg';
	echo esc_url( $output );
}
/**
 * Echo out the escaped url of the displacement image.
 *
 * @param [integer] $data The number of the image.
 */
function grid_displacement( $data ) {
	$filetype = ( 5 === $data || 4 === $data ) ? '.png' : '.jpg';
	$output = get_theme_file_uri() . '/images/img/displacement/' . $data . $filetype;
	echo esc_url( $output );
}

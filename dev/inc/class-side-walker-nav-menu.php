<?php
/**
 * WP Rig Side Walker Nav Menu
 *
 * @package WP Rig
 */

/**
 * Class Name: Side_Walker_Nav_Menu
 * Description: A custom WordPress nav walker class to using materializecss to create a lightweight side menu
 * Author: Nick Mortensen - @nickmortensen
 * Version: 4.1.0
 * Author URI: https://nickmortensen.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/* Check if Class Exists. */
if ( ! class_exists( 'Side_Walker_Nav_Menu' ) ) {
	/**
	 * Side_Walker_Nav_Menu class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Side_Walker_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * Undocumented function
		 *
		 * @param [string] $output What is already put out for any menu.
		 * @param [string] $item I don't know what the fuck it needs here.
		 * @param integer  $depth Menu depth - are there submenus & how far are we going with them.
		 * @param array    $args I don't know what the fuck it needs here.
		 * @param integer  $id Menu id.
		 * @return void
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$description     = $item->description;
			$object          = $item->object;
			$permalink       = $item->url;
			$type            = $item->type;
			$title           = $item->title ? $item->title : 'Needs a Title';
			$city_only = preg_replace( '/Jones\s/', '', $title );
			$item_class_zero = $item->classes[0];
			$item_class_one  = $item->classes[1];
			$item_class      = $item_class_zero . ' ' . $item_class_one;
			// Ensure we are appending to the already existing output variable.
			$output .= '<li class="' . $item_class . ' side">';
			if ( $permalink && '#' !== $permalink ) {
				$output .= '<a class="side-menu-link" href="' . $permalink . '">'; // link tag that surrounds the name of the link.
			} else {
				// Add a 'span' tag is there is no link to visit.
				$ouput .= '<span>';
			}
			// $output .= $title; // Becomes the linked item or goes inside of span tag.
			$output .= $city_only; // Becomes the linked item or goes inside of span tag.

			if ( $permalink && '#' !== $permalink ) {
				// Close the 'a' tag if there is a permalink.
				$output .= '</a>';
				// Close the list item tag that the link is wrapped by.
				$output .= '</li>';
			} else {
				// If no permalink, then just close the span tag.
				$output .= '</span>';
			}

		} // end start_el.

	} // end class
} // end if ( ! class_exists( 'Side_Walker_Nav_Menu' ) ) .

<?php
/**
 * WP Rig Stripe Walker Nav Menu
 *
 * @package WP Rig
 */

 /**
  * Class Name: Stripe_Walker_Nav_Menu
  * Description: A custom WordPress nav walker class meant to utilize stripe's cool menu
  * Author: Nick Mortensen - @nickmortensen
  * Version: 4.1.0
  * Author URI: https://nickmortensen.com
  * License: GPL-3.0+
  * License URI: http://www.gnu.org/licenses/gpl-3.0.txt

  * @link https://courses.wesbos.com/account/access/585dbec8ec270c5bb7763efb/view/194127921
  */

// does the class exist?
if ( ! class_exists( 'Stripe_Walker_Nav_Menu' ) ) {
	/**
	 * Stripe_Waler_Nav_Menu class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Stripe_Walker_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * Create the new menu based on the older one.
		 *
		 * @param [string]  $output What is already being put out by the Walker_Nav_Menu.
		 * @param [string]  $item A Menu Item.
		 * @param [integer] $depth Menu depth - in terms of whether it will allow sub-menus.
		 * @param [array]   $args Not totally sure.
		 * @param [integer] $id Menu ID.
		 * @return void.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$description     = $item->description;
			$object          = $item->object;
			$permalink       = $item->url;
			$type            = $item->type;
			$title           = $item->title ? $item->title : 'Needs a Title';
			$item_class_zero = $item->classes[0];
			$item_class_one  = $item->classes[1];
			$item_class      = $item_class_zero . ' ' . $item_class_one;
			// Ensure we append to what already exists on the $output rather than redefining it.
			$output .= "<li class=\"$item_class\"";
			if ( $permalink && '#' !== $permalink ) {
				$output .= "<a class=\"jones-menu-item\" href=\"${permalink}\">"; // Link tag that surrounds the name of the link.
			} else {
				// Add span tag if there isn't a link to visit.
				$output .= '<span>';
			}

			$output .= $title; // Becomes the linked item of goes inside of the span tag.

			if ( $permalink && '#' !== $permalink ) {
				// If there is no permalink, then close the 'a' tag.
				$output .= '</a>';
				// Also close the list item tag that the 'a' tag is wrapped by.
				$output .= '</li>';
			} else {
				// If there isn't a permalink, then just close the '<span>' tag.
				$output .= '</>';
			}
		}

	} // end class

} // end if ( ! class_exists( 'Stripe_Walker_Nav_Menu' ) ).

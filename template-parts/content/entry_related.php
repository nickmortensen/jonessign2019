<?php
/**
 * Template part for displaying related posts.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

/**
 * Output the content created in the Related_Posts/Component.php file within the display_related_posts function.
 */
wp_rig()->print_styles( 'wp-rig-related' );
wp_rig()->display_related_posts();

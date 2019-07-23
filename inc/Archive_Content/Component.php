<?php
/**
 * WP_Rig\WP_Rig\Archive_Content\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Archive_Conten;

use WP_Rig\WP_Rig\Component_Interface;
// use WP_Rig\WP_Rig\Templating_Component_Interface;
// use function add_action;
// use function add_filter;
// use function add_theme_support;
// use function is_singular;
// use function pings_open;
// use function esc_url;
// use function get_bloginfo;
// use function wp_scripts;
// use function wp_get_theme;
// use function get_template;

/**
 * Class for allowing admin to decide whether to display content or excerpt.
 *
 */
class Component implements Component_Interface {
	/**
	 * Get the unique identifier (slug) for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'archive_content';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		// TODO: Add actions and filters here.
	}
}

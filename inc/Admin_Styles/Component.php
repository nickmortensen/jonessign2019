<?php
/**
 * WP_Rig\WP_Rig\Admin_Styles\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Admin_Styles;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

use function add_action;
use function add_filter;
use function add_theme_support;
use function is_singular;
use function pings_open;
use function esc_url;
use function get_bloginfo;
use function wp_scripts;
use function wp_get_theme;
use function get_template;


/**
 * Class for adding unique css styles to the administrator end of WordPress.
 *
 * Exposes template tags:
 * * `wp_rig()->get_version()`
 * * `wp_rig()->get_asset_version( string $filepath )`
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'admin_styles';
	}

	/**
	 * Add the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		// TODO.
		add_action( 'admin_enqueue_scripts', [ $this, 'action_enqueue_admin_stylesheet' ] );
		add_action( 'login_enqueue_scripts', [ $this, 'action_enqueue_login_stylesheet' ] );
	}

	/**
	 * Register or enqueue styleseet for the administrator.
	 */
	public function action_enqueue_admin_stylesheet() {

		$admin_css_uri = get_theme_file_uri( '/assets/css/admin/' );
		$admin_css_dir = get_theme_file_path( '/assets/css/admin/' );
	}
	/**
	 * Gets all CSS files.
	 *
	 * @return array Associative array of $handle => $data pairs.
	 */
	protected function get_admin_css_files() : array {
		if ( is_array( $this->admin_css_files ) ) {
			return $this->admin_css_files;
		}

		$admin_css_files = [
			'wp-rig-admin-global' => [
				'file'   => '',
				'global' => true,
			],
			'wp-rig-login-global' => [
				'file'   => '',
				'global' => true,
			],
		];
	}
}

// if ( is_admin() ) {

// 	function wprig_admin_stylesheet() {
// 		wp_enqueue_style( 'wprig-admin-style', get_theme_file_uri() . '/css/admin.css', array(), '20190513' );
// 	}
// 	add_action( 'admin_enqueue_scripts', 'wprig_admin_stylesheet' );
// }



// if ( 'wp-login.php' === $GLOBALS['pagenow'] ) {

// 	function wprig_login_stylesheet() {
// 		wp_enqueue_style( 'wprig-login-style', get_theme_file_uri() . '/css/login.css', array(), '20190513' );
// 	}
// 	add_action( 'login_enqueue_scripts', 'wprig_login_stylesheet' );
// }


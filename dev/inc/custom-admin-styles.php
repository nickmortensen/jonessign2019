<?php



if ( is_admin() ) {
	/**
	 * Enqueue special stylesheet for only the admin pages.
	 *
	 * @package wprig
	 */
	function wprig_admin_stylesheet() {
		wp_enqueue_style( 'wprig-admin-style', get_theme_file_uri() . '/css/admin.css', array(), '20190513' );
	}
	add_action( 'admin_enqueue_scripts', 'wprig_admin_stylesheet' );
}


/**
 * Enqueue login stylesheet only on login pages.
 */
if ( 'wp-login.php' === $GLOBALS['pagenow'] ) {
	/**
	 * Enqueue Login Page Stylesheet
	 *
	 * @return void
	 */
	function wprig_login_stylesheet() {
		wp_enqueue_style( 'wprig-login-style', get_theme_file_uri() . '/css/login.css', array(), '20190513' );
	}
	add_action( 'login_enqueue_scripts', 'wprig_login_stylesheet' );
}

/**
 * Enqueue admin stylesheet only on admin pages.
 */

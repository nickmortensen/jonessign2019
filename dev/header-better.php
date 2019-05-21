<?php
/**
 * The header for our theme -- features a side menu
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if ( ! wprig_is_amp() ) : ?>
		<script>document.documentElement.classList.remove("no-js");</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="banner has-better-menu" id="mainHeader" role="banner">

	<!-- make sure the menu slug name is 'better' -->
	<?php if ( has_nav_menu( 'better' ) ) : ?>
	<nav role="navigation" aria-label="<?php esc_attr_e( 'Side Vertical Menu', 'wprig' ); ?>">

		<div class="top-header">
			<div class="navBurger">
				<div class="burger"></div>
			</div><!-- end div.navburger -->
		</div><!-- end div.top-header -->

			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'better',
						'menu_class'     => 'better',
						'menu_id'        => 'menu-vertical-menu',
						'container'      => false,
						'walker'         => new Side_Walker_Nav_Menu(),
					)
				);
			?>
	</nav>
	<!-- end nav.hide-on-small-only -->
	<?php endif; ?>

</header><!-- #mainHeader -->

	<div id="page" class="site">


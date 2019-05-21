<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header( 'better' );

/*
* Include the component stylesheet for the content.
* This call runs only once on index and archive pages.
* At some point, override functionality should be built in similar to the template part below.
*/
// wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.
$header = 1007;
$image_attr = [ 'class' => 'homepage-header img-responsive', 'data-caption' => 'minnesota united' ];
$image = wp_get_attachment_image_src( $header, 'sixteen-nine', false, $image_attr );
// pr( $image );
// NOTE THAT THE POST I AM GOING TO TRY WITH IS 1006.

wp_print_styles( array( 'wprig-front-page', 'wprig-content') );
?>
<style>
	body {
		margin: 0px !important;
	}
.head {
	min-width: 100vw;
	min-height: 90vh;
	/* background-color: red; */
	background-size: cover;
	background-repeat: none;
	position:relative;
}
h1 {
	position: absolute;
	line-height: 154px;
	top:40%;
	left: 18%;
	color: red;
	mix-blend-mode: lighten;
	padding: 0;
	margin: 0;
	line-height: 0.5;
	font-family: "open sans";
}
</style>
<section class="head" style="background-image: url(<?php echo esc_url( $image[0] ); ?>);">

<h1>Jones Sign Co</h1>

</section>
<div style="margin-left: 150px;">
</div>

<?php
get_footer();

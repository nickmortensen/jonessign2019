<?php
/**
 * Template part for displaying the topmost content on the front page of the website.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>
<?php
/**
 * Gather list of 6 most magical photos to show on the site.
 * Ensure they have a good description.
 * Throw them up as section backgrounds in a carousel.
 */
$header     = 1007;
$image_attr = [
	'class'        => 'homepage-header img-responsive',
	'data-caption' => 'minnesota united',
];
$image      = wp_get_attachment_image_src( $header, 'sixteen-nine', false, $image_attr );
?>
<section id="project-images" class="frontpage-section" style="background-image: url(<?php echo esc_url( $image[0] ); ?>);">

<h1 class="experiment">Jones Sign Co</h1>

</section>

<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header( 'jonessign' );

wp_rig()->print_styles( 'wp-rig-page', 'wp-rig-content' );

get_template_part( 'template-parts/content/google-map', '' );

?>

	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content/entry', 'page' );
		}
		?>
	</main><!-- #primary -->
<?php
// $args = [
// 	// 'posts_per_page' => 4,
// 	'post_type'      => 'quote',
// 	'numberposts' => 3,
// ];
// $projects = get_posts( $args );
// $project_ids = [];
// foreach ( $projects as $project ) {
// 	$pid = $project->ID;
// 	$project_ids[] = $pid;
// 	// echo esc_html( $project->post_title );
// 	// echo '<br>';
// }
// $pid_as_string = implode(',', $project_ids );
// echo $pid_as_string;
// echo 'this post id is: ' . get_the_ID();

$field = '';
$quote_id = 1065;
$type = 'quote';

function renderSingleQuote( $id = 1065 ) {
	$quote_id = $id;
	$quoteContent    = get_post_meta( $quote_id, $key = 'quoteContent', true );
	$quoteSource     = get_post_meta( $quote_id, $key = 'quoteSource', true );
	$quoteLinkURL    = get_post_meta( $quote_id, $key = 'quoteLinkURL', true );
	$quoteLinkTitle  = get_post_meta( $quote_id, $key = 'quoteLinkTitle', true );
	$quoteLinkTitle  = get_post_meta( $quote_id, $key = 'quoteLinkTitle', true );
	$quoteLinkTarget = get_post_meta( $quote_id, $key = 'quoteLinkTarget', true );
	$quote = <<<QUOTE
	<h3>$quoteSource</h3>
	<span>$quoteContent</span>
	<a href="$quoteLinkURL" target="$quoteLinkTarget" title="$quoteLinkTitle">$quoteLinkTitle</a>
QUOTE;

	return $quote;
}
echo renderSingleQuote();
get_sidebar();
get_footer();


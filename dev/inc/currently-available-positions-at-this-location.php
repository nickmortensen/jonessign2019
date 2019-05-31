<?php
/**
 * Finds the jobs that are currently available at this location.
 *
 * @package wprig
 */

// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped

/**
 * Gets the whole organiations's schema.
 *
 * @param integer $id The id of the taxonomy term.
 */
function get_currently_available_positions_for_this_location( $id ) {
	$location = get_term( $id, 'location' );
	echo "<h2>Currently Available Positions at {$location->name} </h2>";

	// Query for the 'position' post type that have this location's taxonomy attached to it.
	$arguments = [
		'post_type' => 'position',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $location->slug,
			),
		),
	]; // End of arguments needed to get the positions attached to this location.
	$positions = new WP_QUERY( $arguments );
	// Sanity checking.
	/*pr( $positions ); */
	echo '<div class="jobs-grid">';
	if ( $positions->have_posts() ) {
		while ( $positions->have_posts() ) {
			$size = 'medium';
			$positions->the_post();
			$title = get_the_title();
			$id    = get_the_ID();
			$default_image = wp_get_attachment_image_src( 826, $size );
			$url   = get_permalink();
			$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url( $id, $size ) : $default_image[0];
			$figure = <<<FIGURE
			<figure id="figure" class="image-left">
				<img src="$thumbnail">
				<figcaption>
					<h3><a href="$url">$title</a></h3>
					<h4><a href="#" data-hover="apply">apply</a></h4>
				</figcaption>
			</figure>
FIGURE;

			echo $figure;
		}
		wp_reset_postdata();
	}
	echo '</div>';
} //end function get_currently_available_positions_for_this_location( $id ).

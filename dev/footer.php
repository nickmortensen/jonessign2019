<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package js19
 */

?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package js19
 */

?>

<!-- this is the deafult footer for the site -->

<footer id="colophon" class="site-footer">
<section id="contains-locations-dropdown">
<?php

/** I may not have to make this call to the database considering I already made it within the header to output the JSON-Ld */
	// phpcs:disable
	$args = array(
		'taxonomy'   => 'location',
		'hide_empty' => false,
		'exclude'    => array( 79, 80, 75, 77 ), // 79 is atlanta 73 is VAB 80 is dallas 75 san antonio 77 national 81 phoenix.
	);
	$i = 0;
	$locations_all = [];
	$locations = get_terms( $args );
	// pr($locations);
	$select_open = <<<SELECT
	<div class="select-outer-div">
		<div class="select">
			<select name="location-select" id="slct">
				<option selected disabled>Choose a location!</option>
SELECT;

	echo $select_open;

	$select_close = <<<CLOSESELECT
			</select>
		</div>
	</div>
CLOSESELECT;
	foreach ( $locations as $location ) {

		$name      = preg_replace( '/Jones\s/', '', $location->name );
		$argument  = $location->taxonomy . '_' . $location->term_id;
		$latitude  = get_field( 'jones_latitude', $argument );
		$longitude = get_field( 'jones_longitude', $argument );
		$state     = get_field_object( 'jones_state', $argument );
		$value     = $state['value'];
		$label     = $state['choices'][ $value ];
		$output = <<<DATA
		<option value="$location->slug">$name</option>
DATA;
		echo $output;
	}
	echo $select_close;
	// phpcs:enable
	?>
</section>
<section id="single-location">
<?php 
$single_location_info = <<<LOCATION

<div id="$location->slug" class="single-location">
<h2>$location->name</h2>
</div><!-- end div.single-location -->

LOCATION;

echo $single_location_info;

?>

</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

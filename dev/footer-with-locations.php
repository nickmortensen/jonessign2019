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
	<section id="single-location">
			<?php
			// call for locations data.
			/** I may not have to make this call to the database considering I already made it within the header to output the JSON-Ld */
			// phpcs:disable
			$args = array(
				'taxonomy'   => 'location',
				'hide_empty' => false,
				'exclude'    => array( 79, 80, 75, 77 ), // 79 is atlanta 73 is VAB 80 is dallas 75 san antonio 77 national 81 phoenix.
			);
			$i = 0;
			$locations_all = [];
			$locations     = get_terms( $args );
			foreach ( $locations as $location ) {
				$location_id             = $location->term_id;
				$location_name           = $location->name;
				$location_slug           = $location->slug;
				$location_description    = $location->description;
				$location_count          = $location->count;
				$second                  = $location->taxonomy . '_' . $location->term_id; // Second argument for ACF fields added to this taxonomy.
				// Additional ACF Fields for the 'location' taxonomy.
				$location_photo          = get_field( 'jones_photo', $second );
				$location_street_address = get_field( 'jones_street_address', $second );
				$location_city           = get_field( 'jones_city', $second );
				$location_state          = get_field( 'jones_state', $second );
				$location_zip            = get_field( 'jones_zip', $second );
				$location_phone          = get_field( 'jones_phone', $second );
				$phone                   = $location_phone ? $location_phone : '1-800-836-7446';
				$location_fax            = get_field( 'jones_fax', $second );
				$fax                     = $location_fax ? "\n\t\t\t\t" . '"faxNumber": "' . $location_fax . '",' : '';
				$location_latitude       = get_field( 'jones_latitude', $second );
				$location_longitude      = get_field( 'jones_longitude', $second );
				$gmb_cid_converted       = get_field( 'gmb_cid_converted', $second );
				$map                     = $gmb_cid_converted ? "\n\t\t\t\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '",' : '';
				$location_image_large    = $location_photo['sizes']['large'];
				$image                   = $location_image_large ? "\n\t\t\t\t" . '"image": "' . $location_image_large . '",' : "\n\t\t\t\t" . '"image": "https://jonessign.co/wp-content/uploads/2016/11/las_vegas_sign-1024x532.jpg",';
				$single_location_info = <<<LOCATION
			<div id="$location_slug" class="single-location hidden">
				<address>
				$location_name<br>
				<a href="tel:+1$phone">$phone</a>
				<br>
				$location_street_address<br>
				$location_city, $location_state $location_zip<br>
				</address>
			</div>
			<!-- end div#$location_slug.single-location -->
LOCATION;
				// phpcs:ignore
				echo $single_location_info;
			}//end foreach
			?>
		</section><!-- END section #single-location -->
		<section id="contains-locations-dropdown">
		<?php
		$select_open = <<<SELECT
			<div class="select-outer-div">
				<div class="select">
					<select name="location-select" id="location-select">
						<option value="grb" selected disabled>Choose a location!</option>
SELECT;
		echo $select_open;

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
		}//end foreach
		$select_close = <<<CLOSESELECT
					</select><!-- select#location-select-->
				</div><!-- end div.select -->
			</div><!-- end div.select-outer-div -->
CLOSESELECT;
		echo $select_close;
		// phpcs:enable
		?>
		</section><!-- end section #contains-locations-dropdown -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- when the select option value is selected, remove the .hidden class from the div that has the same id -->
<script>
let selectedLocation = 'grb';
const selectID          = 'location-select'; // the id attribute of the select html tag on this page.
// Return the location slug of the selected element;
const returnSelectValue = () => document.getElementById(selectID).options[document.getElementById(selectID).selectedIndex].value;

/**
 * If the location is selected from the select box, then show the full div containing the location information. Otherwise do not show the div.
 */
function showThisLocation() {
	let locations          = document.querySelectorAll('.single-location'); // all the single location boxes (initially hidden)

	let selectedLocation = returnSelectValue();
	locations.forEach(location => {
		// If the location's id (which is the slug) matches the value for the selected option, check if it has the class of hidden and if it does, then remove it.
		if ((location.id === selectedLocation) && location.classList.contains('hidden')) location.classList.remove('hidden');

		// If the location's id (which is the slug) DOES NOT MATCH the value for the selected option, check if it has the class of hidden and if it doesn't, add it.
		// NOTE: This is important because it removes visibility of the previous item that was chosen from the select box, if there was one already chosen.
		// Otherwise, the locations would stack upeach time you chose one.
		if ((location.id !== selectedLocation) && !location.classList.contains('hidden')) location.classList.add('hidden');

	})
}
let locationSelect  = document.getElementById(selectID); // the select input.
locationSelect.addEventListener('change', showThisLocation, false); // instantiate the function only when the select box has chosen a new value.
</script>

</body>
</html>

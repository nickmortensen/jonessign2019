<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header();

/**
 * Get the City Name from the Slug. Used when dealing with branch locations.
 *
 * @param string $slug      The airport code of the nearest airport to the location - mxt and mxz for Tijuana and Juarez, respectively.
 * @return string $location The full name of the city.
 */

function get_slug_from_city( $city ) {
	switch ( $city ) {
		case 'Dallas':
			$slug = 'dfw';
			break;
		case 'Denver':
			$slug = 'den';
			break;
		case 'Green Bay':
			$slug = 'grb';
			break;
		case 'Juárez':
			$slug = 'mxz';
			break;
		case 'Las Vegas':
			$slug = 'las';
			break;
		case 'Los Angeles':
			$slug = 'lax';
			break;
		case 'Miami':
			$slug = 'mia';
			break;
		case 'Minneapolis':
			$slug = 'msp';
			break;
		case 'Philadelphia':
			$slug = 'phl';
			break;
		case 'Reno':
			$slug = 'rno';
			break;
		case 'Richmond':
			$slug = 'ric';
			break;
		case 'San Diego':
			$slug = 'san';
			break;
		case 'Tampa':
			$slug = 'tpa';
			break;
		case 'Tijuana':
			$slug = 'mxt';
			break;
		case 'Virginia Beach':
			$slug = 'vab';
			break;
		default:
			$slug = 'grb';
	}//end switch
	return $slug;
}
function get_city_from_slug( $slug ) {
	switch ( $slug ) {
		case 'dfw':
			$location = 'Dallas';
			break;
		case 'den':
			$location = 'Denver';
			break;
		case 'grb':
			$location = 'Green Bay';
			break;
		case 'mxz':
			$location = 'Juárez';
			break;
		case 'las':
			$location = 'Las Vegas';
			break;
		case 'lax':
			$location = 'Los Angeles';
			break;
		case 'mia':
			$location = 'Miami';
			break;
		case 'msp':
			$location = 'Minneapolis';
			break;
		case 'phl':
			$location = 'Philadelphia';
			break;
		case 'rno':
			$location = 'Reno';
			break;
		case 'ric':
			$location = 'Richmond';
			break;
		case 'san':
			$location = 'San Diego';
			break;
		case 'tpa':
			$location = 'Tampa';
			break;
		case 'mxt':
			$location = 'Tijuana';
			break;
		case 'vab':
			$location = 'Virginia Beach';
			break;
		default:
				$location = 'Green Bay';
	}//end switch
	return $location;
}
/*
* Include the component stylesheet for the content.
* This call runs only once on index and archive pages.
* At some point, override functionality should be built in similar to the template part below.
*/
// wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.
$header     = 1007;
$image_attr = [
	'class'        => 'homepage-header img-responsive',
	'data-caption' => 'minnesota united',
];
$image      = wp_get_attachment_image_src( $header, 'sixteen-nine', false, $image_attr );
// pr( $image );
// NOTE THAT THE POST I AM GOING TO TRY WITH IS 1006.
// wp_print_styles( array( 'wprig-front-page', 'wprig-content' ) ); .
?>
<style>
::selection {
	background: red;
	color: white;
}
</style>
<div class="locations">
	<h2>locations</h2>
	<code>
<?php
$taxonomy = 'location';
$i = 0;
$locations = get_terms( [ 'taxonomy' => $taxonomy, 'exclude' => 79, ] );
foreach( $locations as $location ) {
	$queried_object          = $location; // https://codex.wordpress.org/Function_Reference/get_queried_object.
	$taxonomy_name           = $queried_object->taxonomy;
	$term_id                 = $queried_object->term_id;
	$term_slug               = $queried_object->slug;
	$term_name               = $queried_object->name;
	$location_name = $term_name;
	$nearby_city             = preg_replace( '/Jones\s/', '', $term_name );
	$location_description    = $queried_object->description;
	$location_count          = $queried_object->count;
	$second                  = $queried_object->taxonomy . '_' . $queried_object->term_id; // Second argument for ACF fields added to this taxonomy.
	$location_street_address = get_field( 'jones_street_address', $second );
	$location_city           = get_field( 'jones_city', $second );
	$location_country        = get_field( 'jones_country', $second );
	$location_state          = get_field( 'jones_state', $second );
	$location_zip            = get_field( 'jones_zip', $second );
	$location_phone          = get_field( 'jones_phone', $second );
	$location_latitude       = get_field( 'jones_latitude', $second );
	$location_longitude      = get_field( 'jones_longitude', $second );
	$gmb_cid                 = get_field( 'gmb_cid_converted', $second ) ?? '10408662568689642143';

	// echo "{ location: '$term_name', latitude: $location_latitude, longitude: $location_longitude },";
	// $option =  "<option value=\"$term_slug\" data-address=\"$location_street_address\" data-state=\"$location_state\" data-city=\"$nearby_city\" data-actual-city=\"$location_city\" data-zip=\"$location_zip\" data-country=\"$location_country\" data-phone=\"$location_phone\" data-google-my-business-cid=\"$gmb_cid\" class=\"weather__location\">$term_name</option>";
	// echo esc_html( $option );

	$output = <<<OP
case '$nearby_city':<br>
\t\$slug = '$term_slug';<br>
\tbreak;<br>

OP;
	echo $output;
}

wp_reset_postdata();
?>
</code>
</div>

<div class="content">
	<div class="pattern pattern--hidden"></div>
	<div class="wrapper">
		<h2>Our Services</h2>
	<?php
	// SERVICES TAXONOMY ITEMS.
	$taxonomy = 'service';
	$services = get_terms( [ 'taxonomy' => $taxonomy ] );
	$i = (int) 0;
	foreach ( $services as $service ) {
		$id        = $service->term_id;
		$name      = $service->name;
		$long_desc = $service->description;
		$items     = $service->count;
		$link      = get_term_link( $id );

		$second                = "{$taxonomy}_{$id}";
		$showcase              = get_field( 'service_showcase_project', $second ); // returns a post object.
		$showcase_id           = $showcase->ID;
		$showcase_title        = $showcase->post_title;
		$showcase_img_1_id     = get_field( 'service_primary_square_image', $second ); // returns id.
		$showcase_img_2_id     = get_field( 'service_secondary_square_image', $second ); // returns id.
		$service_main_image_id = get_field( 'service_main_image', $second ); // returns id.
		$service_main_image_id = 1015;
		$img = wp_get_attachment_image_url( $service_main_image_id, 'full', true );
		$small_img = wp_get_attachment_image_url( $service_main_image_id, 'medium', true );
		$button                = get_field( 'service_button_label', $second ) ?? 'TERM NAME';
		$brief_desc            = get_field( 'service_desc_in_brief', $second ) ?? 'Some bullshit here';

		++$i;
		$output = <<<CARDSETUP
		<div class="card">
			<div class="card__container card__container--closed" >

<svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 500" preserveAspectRatio="xMidYMid slice">

					<defs>

						<clipPath id="clipPath$i">
							<circle class="clip" cx="960" cy="250" r="992"></circle>
						</clipPath>


						<filter id="duoTone">
  <!-- Flood area with red to serve as background. -->
  <feFlood x="0" y="0" width="100%" height="100%" flood-color="#f25f5c" flood-opacity="1" result="red" />
  <feFlood x="0" y="0" width="100%" height="100%" flood-color="#efefef" flood-opacity="1" result="offwhite" />

  <!-- Create alpha layer. -->
  <feColorMatrix in="SourceGraphic" type="luminanceToAlpha" result="alpha" />

  <!-- Flood area with blue. -->
  <feFlood x="0" y="0" width="100%" height="100%" flood-color="#247ba0" flood-opacity="1" result="blue" />
  <feFlood x="0" y="0" width="100%" height="100%" flood-color="#0273b9" flood-opacity="1" result="blue" />

  <!-- Composite green and alpha layer. -->
  <feComposite in="blue" in2="alpha" operator="out" result="composite" />
  <feMerge>
    <feMergeNode in="offwhite" />
    <feMergeNode in="composite" />
  </feMerge>

</filter>


					</defs>


<image clip-path="url(#clipPath$i)" width="1920" height="500" xlink:href="$img"
style="filter:url(#duoTone);"></image>

</svg>

				<div
				class="card__content" >
					<i class="card__btn-close fa fa-times" title="Click to close this & return to the frontpage"></i>
					<div class="card__caption" style="background: rgba(0,0,0,.6);">
						<h2 class="card__title" >$i $name...</h2>
						<p class="card__subtitle">$brief_desc</p>
					</div>
					<div class="card__copy">
						<div class="meta">
							<span class="meta__author">Services</span>
						</div><!-- end div.meta -->
						<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
					</div><!-- end card__copy-->
				</div><!-- end card__content -->

			</div><!-- end card__container -->
		</div>
CARDSETUP;
		// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $output;
	}//end foreach
	?>


	</div><!-- end div.wrapper-->
</div><!-- end div.content-->
<?php
get_footer();

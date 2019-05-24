<?php
/**
 * Schema generation for Organization + locations
 *
 * @package wprig
 */

/**
 * Add json-ld version of the schema.org schema for Organization + all locations of Jones Sign Company
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Gets the whole organiations's schema
 */
function show_all_locations_rich_snippet() {
	/**
	 * TODO -- ADD THIS ALSO TO THE 'ALL' LOCATIONS TAXONOMY ARCHIVE PAGE.
	 */
	if ( ! is_front_page() && ! is_page( '932' ) ) {
		return;
	}
	// Setup variables.
	// Instantiate the iterator variable.
	$i                 = 0;
	$about_us_copy     = 'Since 1910, Jones Sign Company has provided industry-leading design, manufacturing, installation, & maintenance of signage, lighting, & architectural elements to construction companies, design firms, national brands, & local clientele.';
	$all_company_image = 'https://jonessign.com/wp-content/uploads/2015/08/jones_central.jpg';
	$company_url       = 'https://jonessign.com';
	$company_logo_url  = 'https://jonessign.com/wp-content/uploads/2017/05/2016_jones_yva_blue_grey_273x85_semibold.png';
	$company_name      = 'Jones Sign Company, Inc.';
	$facebook          = 'https://www.facebook.com/JonesSignCompany/';
	$twitter           = 'https://twitter.com/jonessign';
	$linked_in         = 'https://www.linkedin.com/company/jones-sign-co--inc-';
	$slogan            = 'Your Vision. Accomplished.';
	// Query for all locations minus a few that we don't want anything to do with.
	$args            = array(
		'taxonomy'   => 'location',
		'hide_empty' => false,
		'exclude'    => array( 79, 73, 80, 75, 77 ), // 79 is atlanta 73 is chicago 80 is dallas 75 san antonio 77 national 81 phoenix.
	);
	$locations       = get_terms( $args );
	$locations_count = count( $locations ); // Need this to ensure there isn't a final comma when looping to get an array.
	/**
	 * Establish the "Organization: aspect of the json-ld used for google.
	 * This is later combined in the return statement.
	 *
	 * Note that I am using the heredoc syntax (<<<JSONLDOPEN).
	 * More info at: https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc.
	 */

	$json_ld_open = <<<JSONLDOPEN
	<script type="application/ld+json">

	{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "$company_name",
		"url": "$company_url",
		"logo": "$company_logo_url",
		"foundingDate": "1910",
		"foundingLocation": "Green Bay, WI",
		"alternateName": ["Jones Sign Company", "Jones Sign", "Jones Sign Co"],
		"slogan": "Your Vision. Accomplished.",
		"legalName": "Jones Sign Co., Inc.",
		"sameAs": ["$facebook", "$twitter", "$linked_in"],
		"location":
			[
JSONLDOPEN;

	// Now, establish an array to place the individual location data into during the subsequent loop.
	$locations_data = [];
	foreach ( $locations as $location ) {
		// Establish variables drawing from the taxonomy term object and the additional fields that have been added to the location taxonomy.
		$location_id          = $location->term_id;
		$location_name        = $location->name;
		$location_slug        = $location->slug;
		$location_description = $location->description;
		$location_count       = $location->count;
		$second               = $location->taxonomy . '_' . $location->term_id; // Second argument for ACF fields added to this taxonomy.
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
		$json_ld_locations_array = <<<JLD
				{
					"@type": "LocalBusiness",
					"parentOrganization": {
						"name": "$company_name"
					},
					"url": "$company_url/jones-locations/$location_slug/",
					"name": "$location_name",$image$map
					"address": {
						"@type": "PostalAddress",
						"addressLocality": "$location_city",
						"addressRegion": "$location_state",
						"postalCode": "$location_zip",
						"streetAddress": "$location_street_address"
					},
					"openingHours": ["Mo-Fr 08:00-17:00"],
					"telephone": "$phone",$fax
					"geo": {
						"@type": "GeoCoordinates",
						"latitude": "$location_latitude",
						"longitude": "$location_longitude"
					},
					"priceRange": "$200-$1000000",
					"paymentAccepted":"Cash, Credit Card, Check, Purchase Order"
				}
JLD;
		// Add each new locations data to the array. $i was instantiated at the very beginning of this function.
		$locations_data[] = $json_ld_locations_array;
	}// END foreach.
	// Establish the end of the json-ld outside of the loop.
	$json_ld_close = <<<JSONLDCLOSE
			],
		"image": "$all_company_image",
		"email": "leads@jonessign.com",
		"description": "$about_us_copy"
	}
	</script>
JSONLDCLOSE;

	$json_ld_data  = $json_ld_open;
	$json_ld_data .= implode( ', ', $locations_data );
	$json_ld_data .= $json_ld_close;
	// phpcs:ignore
	echo $json_ld_data;
} // END all_schema_organization() definition.
// Only add this if it is the front page or the all locations page.
add_action( 'wp_head', 'show_all_locations_rich_snippet', 9 );

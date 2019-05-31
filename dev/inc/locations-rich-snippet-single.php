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
function add_single_location_rich_snippet() {

	// Setup variables.
	// Instantiate the iterator variable.
	$i                       = 0; // DO I NEED AN INTERATOR? THIS IS FOR BUT A SINGLE LOCATION <-- SO I BELIEVE NOT.
	$about_us_copy           = 'Since 1910, Jones Sign Company has provided industry-leading design, manufacturing, installation, & maintenance of signage, lighting, & architectural elements to construction companies, design firms, national brands, & local clientele.';
	$all_company_image       = 'https://jonessign.com/wp-content/uploads/2015/08/jones_central.jpg';
	$company_url             = 'https://jonessign.com';
	$company_logo_url        = 'https://jonessign.com/wp-content/uploads/2017/05/2016_jones_yva_blue_grey_273x85_semibold.png';
	$company_name            = 'Jones Sign Company, Inc.';
	$facebook                = 'https://www.facebook.com/JonesSignCompany/';
	$twitter                 = 'https://twitter.com/jonessign';
	$linked_in               = 'https://www.linkedin.com/company/jones-sign-co--inc-';
	$slogan                  = 'Your Vision. Accomplished.';
	// THE SINGLE LOCATION (OR ANY SINGLE TAG IN A TAXONOMY) SHOULD BE THE QUERIED OBJECT.
	$queried_object          = get_queried_object(); // https://codex.wordpress.org/Function_Reference/get_queried_object.
	$taxonomy_name           = $queried_object->taxonomy;
	$term_id                 = $queried_object->term_id;
	$term_slug               = $queried_object->slug;
	$term_name               = $queried_object->name;
	$nearby_city             = preg_replace( '/Jones\s/', ' ', $term_name );
	$location_description    = $queried_object->description;
	$location_count          = $queried_object->count;
	$second                  = $queried_object->taxonomy . '_' . $queried_object->term_id; // Second argument for ACF fields added to this taxonomy.
	$location_street_address = get_field( 'jones_street_address', $second );
	$location_city           = get_field( 'jones_city', $second );
	$location_state          = get_field( 'jones_state', $second );
	$location_zip            = get_field( 'jones_zip', $second );
	$location_phone          = get_field( 'jones_phone', $second );
	$phone                   = $location_phone ? $location_phone : '1-800-836-7446';
	$location_fax            = get_field( 'jones_fax', $second );
	$fax                     = $location_fax ? ",\n\t\t\t\t" . '"faxNumber": "' . $location_fax . '",' : '';
	$location_latitude       = get_field( 'jones_latitude', $second );
	$location_longitude      = get_field( 'jones_longitude', $second );
	$gmb_cid_converted       = get_field( 'gmb_cid_converted', $second );
	$map                     = $gmb_cid_converted ? ",\n\t\t\t\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '"' : '';
	$location_photo          = get_field( 'location_photo_id', $second );
	$location_image_large    = wp_get_attachment_image_src( $location_photo, 'full' );
	$image                   = $location_image_large ? ",\n\t\t\t\t" . '"image": "' . $location_image_large[0] . '"' : ",\n\t\t\t\t" . '"image": "$all_company_image"';
	/**
	 * Establish the "Organization: aspect of the json-ld used for google.
	 * This is later combined in the return statement.
	 *
	 * Note that I am using the heredoc syntax (<<<JSONLDOPEN).
	 * More info at: https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc.
	 */

	$single_location_jsonld = <<<SINGLELOCATIONJSONLD
<!-- BEGIN json-ld rich snippet markup for a single location taxonomy page -->
<script type="application/ld+json">
{
	"@context": {
		"@vocab": "http://schema.org/"
	},
	"@graph": [
		{
			"@id": "$company_url",
			"@type": "Organization",
			"name": "$company_name",
			"slogan": "$slogan",
			"url": "$company_url",
			"logo": "$company_logo_url",
			"legalName": "Jones Sign Co., Inc.",
			"sameAs": [
				"$facebook",
				"$twitter",
				"$linked_in"
			],
			"alternateName": [
				"Jones Sign Company$nearby_city",
				"Jones Sign$nearby_city",
				"Jones Signs$nearby_city",
				"Jones$nearby_city"
			],
			"foundingDate": "1910",
			"foundingLocation": "Green Bay, WI",
			"email": "leads@jonessign.com",
			"description": "$about_us_copy"
		},
		{
			"@type": "LocalBusiness",
			"priceRange": "$200 - $1000000",
			"parentOrganization": {
				"name": "$company_name"
			},
			"name": "$term_name",
			"alternateName": [
				"Jones Sign Company",
				"Jones Sign",
				"Jones Sign Co"
			],
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "$location_street_address",
				"addressLocality": "$location_city",
				"addressRegion": "$location_state",
				"postalCode": "$location_zip",
				"telephone": "$location_phone"$fax
			},
			"paymentAccepted":"Cash, Credit Card, Check, Purchase Order",
			"openingHours": ["Mo-Fr 08:00-17:00"],
			"url": "$company_url/jones-location/$term_slug/",
			"branchCode": "$term_slug",
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": "$location_latitude",
				"longitude": "$location_longitude"
			}$map$image
		}
	]
}
</script>
<!-- end of json-ld rich snippet markup for a single location taxonomy page -->

SINGLELOCATIONJSONLD;
	return $single_location_jsonld;
}
// END add_single_location_rich_snippet() definition.
// Only Add this action if the page is one of the 'location' taxonomy pages.
// add_action( 'wp_head', 'add_single_location_rich_snippet', 9 ); !

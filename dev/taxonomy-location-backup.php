<?php
/**
 * The template for displaying the custom taxonomy 'location' tags
 *
 * @note THIS IS SET SO THE LOCATIONS ARE COMPLETE ENTITIES AS FAR AS JSON-LD
 * @note THERE IS ANOTHER OPTION THAT PUTS JONES SIGN AS AN ORGANIZATION AND ALL THE LOCATIONS AS SUB
 * @since 1.0.1
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package js19
 */
get_header( 'better' );
?>
<?php
/**
 * Here is some setup for when this becomes and individual location page
 */
// SINGLE LOCATION SETUP.
$location = get_queried_object();
$id                    = $location->term_id;
$name                  = $location->name;
$slug                  = $location->slug;
$description           = $location->description;
$count                 = $location->count;
// additional ACF FIELDS.
$second                = $location->taxonomy . '_' . $location->term_id; // Second argument for ACF fields added to this taxonomy.
$address               = get_field( 'jones_street_address', $second );
$city                  = get_field( 'jones_city', $second );
$state                 = get_field( 'jones_state', $second );
$zip                   = get_field( 'jones_zip', $second );
$location_phone        = get_field( 'jones_phone', $second );
$phone                 = $location_phone ? $location_phone : '1-800-836-7446';
$location_fax          = get_field( 'jones_fax', $second );
$fax                   = $location_fax ? "\n\t" . '"faxNumber": "' . $location_fax . '",' : '';
$latitude              = get_field( 'jones_latitude', $second );
$longitude             = get_field( 'jones_longitude', $second );
$gmb_cid_converted     = get_field( 'gmb_cid_converted', $second );
$map                   = $gmb_cid_converted ? "\n\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '",' : '';
$location_photo        = get_field( 'jones_photo', $second );
$location_image_large  = $location_photo['sizes']['large'];
$image                 = $location_image_large ? "\n\t" . '"image": "' . $location_image_large . '",' : '';
// END SINGLE LOCATION.
?>
<?php
/**
 * Note that this ends up being the schema for all the locations
 * as of 07may2019 there is still some tweaking to do on this.
 */
$args = array(
	'taxonomy'   => 'location',
	'hide_empty' => false,
	'exclude'    => array( 79, 73, 80, 75, 77 ), // 79 is atlanta 73 is chicago 80 is dallas 75 san antonio 77 national 81 phoenix
);
$locations = get_terms( $args );
// pr( $locations );
// $locations = [ 79, 83, 66, 72, 67, 78, 82, 70, 69, 68, 76, 74, 71 ]; // location IDs.
$locations_count = count( $locations );
foreach ( $locations as $location ) {
	$company_logo_url         = 'https://jonessign.com/wp-content/uploads/2017/05/2016_jones_yva_blue_grey_273x85_semibold.png';
	$company_name             = 'Jones Sign Company';
	$location_id              = $location->term_id;
	$location_name            = $location->name;
	$location_slug            = $location->slug;
	$location_description     = $location->description;
	$location_count           = $location->count;
	$second                   = $location->taxonomy . '_' . $location->term_id; // Second argument for ACF fields added to this taxonomy.
	// Additional ACF Fields for the 'location' taxonomy.
	$location_photo           = get_field( 'jones_photo', $second );
	$location_street_address  = get_field( 'jones_street_address', $second );
	$location_city            = get_field( 'jones_city', $second );
	$location_state           = get_field( 'jones_state', $second );
	$location_zip             = get_field( 'jones_zip', $second );
	$location_phone           = get_field( 'jones_phone', $second );
	$phone                    = $location_phone ? $location_phone : '1-800-836-7446';
	$location_fax             = get_field( 'jones_fax', $second );
	$fax                      = $location_fax ? "\n\t" . '"faxNumber": "' . $location_fax . '",' : '';
	$location_latitude        = get_field( 'jones_latitude', $second );
	$location_longitude       = get_field( 'jones_longitude', $second );
	$gmb_cid_converted        = get_field( 'gmb_cid_converted', $second );
	$map                      = $gmb_cid_converted ? "\n\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '",' : '';
	$location_image_large     = $location_photo['sizes']['large'];
	$image                    = $location_image_large ? "\n\t" . '"image": "' . $location_image_large . '",' : '';



$json_ld = <<<JLD
<script type="application/ld+json">
{
\t"@context": "http://schema.org",
\t"@type": "LocalBusiness",
\t"@id": "https://www.jonessign.com",
\t"address": {
\t\t"@type": "PostalAddress",
\t\t"addressLocality": "$location_city",
\t\t"addressRegion": "$location_state",
\t\t"streetAddress": "$location_street_address",
\t\t"postalCode": "$location_zip"
\t},
\t"telephone": "$phone",$fax
\t"name": "$company_name",
\t"logo": "$company_logo_url",$image
\t"description": "$about_us_copy",
\t"alternateName": "$location_name",
\t"openingHours":["Mo-Fr 08:00-17:00"],
\t"paymentAccepted":"Cash, Credit Card, Check, Purchase Order",
\t"url":"https://www.jonessign.com",
\t"foundingDate": "1910",
\t"foundingLocation": "Green Bay, WI",
\t"geo": {
\t\t"@type": "GeoCoordinates",
\t\t"latitude": "$location_latitude",
\t\t"longitude": "$location_longitude"
\t},
\t"slogan": "Your Vision. Accomplished.",
\t"legalName": "Jones Sign Co., Inc.",
\t"sameAs": ["https://www.facebook.com/JonesSignCompany/", "https://twitter.com/jonessign", "https://www.linkedin.com/company/jones-sign-co--inc-"],
\t"priceRange": "$200-$1000000"
}
</script>
JLD;
	echo $json_ld;
	echo '<br/>';
}
// END foreach ( $locations as $location ).

?>
<?php
get_footer();

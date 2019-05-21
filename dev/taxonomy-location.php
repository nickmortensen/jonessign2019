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
<section style="padding-left: 80px; margin-top: 0px; background:red; min-height: 95vh;">
<h1>
<?php echo esc_url( $location_image_large ); ?>
</h1>
</section>


<?php
get_footer();

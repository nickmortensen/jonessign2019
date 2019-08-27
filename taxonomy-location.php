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

?>
<?php
/**
 * Here is some setup for when this becomes and individual location page
 */
// SINGLE LOCATION SETUP

/*
locationURL
locationWithinFooter
locationCapabilities
locationImage
locationPhone
locationAddress
locationCity
locationState
locationZip
locationLatitude
locationLongitude
locationGoogleCID
*/
$location = get_queried_object();
$id                    = $location->term_id;
$name                  = $location->name;
$slug                  = $location->slug;
$description           = $location->description;
$count                 = $location->count;
// additional ACF FIELDS.
// $second                = $location->taxonomy . '_' . $location->term_id; // Second argument for ACF fields added to this taxonomy.
// $address               = get_field( 'jones_street_address', $second );
// $city                  = get_field( 'jones_city', $second );
// $state                 = get_field( 'jones_state', $second );
// $zip                   = get_field( 'jones_zip', $second );
// $location_phone        = get_field( 'jones_phone', $second );
// $phone                 = $location_phone ? $location_phone : '1-800-836-7446';
// $location_fax          = get_field( 'jones_fax', $second );
// $fax                   = $location_fax ? "\n\t" . '"faxNumber": "' . $location_fax . '",' : '';
// $latitude              = get_field( 'jones_latitude', $second );
// $longitude             = get_field( 'jones_longitude', $second );
// $gmb_cid_converted     = get_field( 'gmb_cid_converted', $second );
// $map                   = $gmb_cid_converted ? "\n\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '",' : '';
// $location_photo        = get_field( 'jones_photo', $second );
// $location_image_large  = $location_photo['sizes']['large'];
// $image                 = $location_image_large ? "\n\t" . '"image": "' . $location_image_large . '",' : '';
// END SINGLE LOCATION.
?>
<?php
/**
 * Note that this ends up being the schema for all the locations
 * as of 07may2019 there is still some tweaking to do on this.
 */
// COVERS ALL LOCATIONS AND LIOOPS.
get_header();
$args = array(
	'taxonomy'   => 'location',
	'hide_empty' => false,
	'exclude'    => array( 79, 73, 80, 75, 77 ), // 79 is atlanta 73 is chicago 80 is dallas 75 san antonio 77 national 81 phoenix
);
$locations = get_terms( $args );
// pr( $locations );
// $locations = [ 79, 83, 66, 72, 67, 78, 82, 70, 69, 68, 76, 74, 71 ]; // location IDs.
$locations_count = count( $locations );
get_footer();


$term_id = get_queried_object()->term_id;
function output_term_meta( $tag, $field ) {

}
$meta_field            = [ 'locationURL', 'locationWithinFooter', 'locationCapabilities', 'locationImage', 'locationPhone', 'locationAddress', 'locationCity', 'locationState', 'locationZip', 'locationLatitude', 'locationLongitude', 'locationGoogleCID', ];
$locationURL          = get_term_meta( $term_id, 'locationURL', true ) ? get_term_meta( $term_id, 'locationURL', true ) : 'https://jonessign.com';
$locationWithinFooter = get_term_meta( $term_id, 'locationWithinFooter', true ) ?? 'off';
$locationCapabilities = get_term_meta( $term_id, 'locationCapabilities', true ) ? get_term_meta( $term_id, 'locationCapabilities', true ) : ''; // Outputs as an array.
$locationImage        = get_term_meta( $term_id, 'locationImage', true ) ? get_term_meta( $term_id, 'locationImage', true ) : '';
$locationPhone        = get_term_meta( $term_id, 'locationPhone', true ) ? get_term_meta( $term_id, 'locationPhone', true ) : '1-800-536-SIGN';
$locationAddress      = get_term_meta( $term_id, 'locationAddress', true ) ? get_term_meta( $term_id, 'locationAddress', true ) : '1711 Scheuring Road';
$locationCity         = get_term_meta( $term_id, 'locationCity', true ) ? get_term_meta( $term_id, 'locationCity', true ) : 'Green Bay';
$locationState        = get_term_meta( $term_id, 'locationState', true ) ? get_term_meta( $term_id, 'locationState', true ) : 'Mexico';
$locationZip          = get_term_meta( $term_id, 'locationZip', true ) ? get_term_meta( $term_id, 'locationZip', true ) : '';
$locationLatitude     = get_term_meta( $term_id, 'locationLatitude', true ) ? get_term_meta( $term_id, 'locationLatitude', true ) : '';
$locationLongitude    = get_term_meta( $term_id, 'locationLongitude', true ) ? get_term_meta( $term_id, 'locationLongitude', true ) : '';
$locationGoogleCID    = get_term_meta( $term_id, 'locationGoogleCID', true ) ? get_term_meta( $term_id, 'locationGoogleCID', true ) : '';

function variable_name( &$var, $scope=false, $prefix='UNIQUE', $suffix='VARIABLE' ){
    if($scope) {
        $vals = $scope;
    } else {
        $vals = $GLOBALS;
    }
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
        if($val === $new) $vname = $key;
    }
    $var = $old;
    return $vname;
}


echo "<dl>";


function data_inside_tag( $fieldname, $data, $tag = 'dd' ) {
	echo "<dt>{$fieldname}</dt>";
	echo "<{$tag}>{$data}</{$tag}>";
}
pr($locationCapabilities);
echo '<dt>Capabilities</dt>';
echo "<dd>";
echo implode(", ", $locationCapabilities);
echo "</dd>";
data_inside_tag( 'locationURL', $locationURL );
data_inside_tag( 'locationWithinFooter', $locationWithinFooter );
data_inside_tag( 'locationImage', $locationImage );
data_inside_tag( 'locationPhone', $locationPhone );
data_inside_tag( 'locationAddress', $locationAddress );
data_inside_tag( 'locationCity', $locationCity );
data_inside_tag( 'locationState', $locationState );
data_inside_tag( 'locationZip', $locationZip );
data_inside_tag( 'locationLatitude', $locationLatitude );
data_inside_tag( 'locationLongitude', $locationLongitude );
data_inside_tag( 'locationGoogleCID', $locationGoogleCID );


echo "</dl>";
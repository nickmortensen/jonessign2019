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

// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
get_header( 'better' );
?>
<?php
/**
 * Here is some setup for when this becomes and individual location page
 */
// SINGLE LOCATION SETUP.
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
	$location_name = $term_name;
	$nearby_city             = preg_replace( '/Jones\s/', ' ', $term_name );
	$location_description    = $queried_object->description;
	$location_count          = $queried_object->count;
	$second                  = $queried_object->taxonomy . '_' . $queried_object->term_id; // Second argument for ACF fields added to this taxonomy.
	$location_street_address = get_field( 'jones_street_address', $second );
	$location_city           = get_field( 'jones_city', $second );
	$location_state          = get_field( 'jones_state', $second );
	$location_zip            = get_field( 'jones_zip', $second );
	$location_phone          = get_field( 'jones_phone', $second );
	$address = <<<ADDRESS
	$location_street_address <br>
	$location_city, $location_state $location_zip
ADDRESS;
	$phone                   = $location_phone ? $location_phone : '1-800-836-7446';
	$location_fax            = get_field( 'jones_fax', $second );
	$fax                     = $location_fax ? ",\n\t\t\t\t" . '"faxNumber": "' . $location_fax . '",' : '';
	$location_latitude       = get_field( 'jones_latitude', $second );
	$location_longitude      = get_field( 'jones_longitude', $second );
	$gmb_cid_converted       = get_field( 'gmb_cid_converted', $second );
	$map                     = $gmb_cid_converted ? ",\n\t\t\t\t" . '"hasMap": "https://maps.google.com/maps?cid=' . $gmb_cid_converted . '"' : '';
	$location_photo          = get_field( 'location_photo_id', $second );
	$location_image_large    = wp_get_attachment_image_src( $location_photo, 'full' );
	$image                   = $location_image_large ? "\n\t\t\t\t" . '"image": "' . $location_image_large[0] . '",' : "\n\t\t\t\t" . '"image": "https://jonessign.co/wp-content/uploads/2016/11/las_vegas_sign-1024x532.jpg",';
	/**
	 * Establish the "Organization: aspect of the json-ld used for google.
	 * This is later combined in the return statement.
	 *
	 * Note that I am using the heredoc syntax (<<<JSONLDOPEN).
	 * More info at: https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc.
	 */


?>
<section id="taxonomy-header" style="background-repeat: no-repeat; background-size: cover; background-image: url(<?php echo $location_image_large[0]; ?>);">
	<div class="address-information">
			<div><?php echo $location_name; ?></div>
			<div><?php echo $address; ?></div>
			<div><?php echo $phone; ?></div>
	</div><!-- END div.address-information -->
</section><!-- end section#single-location-->

<section id="currently-available-positions-at-this-location" style="padding-left: 80px;">
<?php
wp_reset_postdata();
get_currently_available_positions_for_this_location( $term_id );
?>

</section><! end section#currently-available-positions-at-this-location -->


<?php
get_footer();


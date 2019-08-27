<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

//phpcs:disable WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
namespace WP_Rig\WP_Rig;

get_header();
wp_rig()->print_styles( 'wp-rig-content' );
$mapsAPIKEY = 'AIzaSyA0MDoRSgplGB61I9jYOk9wFBGzoUb7QLs';
$project     = get_queried_object(); // Returns what the page represents - in this page the single post.
$projectID   = get_queried_object()->ID;
// Instantiate postData array - will later be merged with the post_meta.
$postData    = [];
$meta_fields  = [ 'ID', 'post_content', 'post_title', 'post_excerpt', 'guid', 'post_type' ];
foreach ( $meta_fields as $key ) {
	// Send some of the post information to the $postData array.
	$postData[ $key ] = get_queried_object()->$key;
}
// Instantiate an array to contain the relevant cmb2 field data for the post type 'project'.
$postMeta             = [];
$meta_fields           = [ 'projectJobNumber', 'projectJobStatus', 'projectExpectedCompletionYear', 'projectSVGLogo', '_thumbnail_id', 'projectLocation', 'projectCompletedYear', 'projectYearStarted', 'projectTease', 'projectNarrative', 'partnerInformation' ];

/**
 * Run function to populate the postMeta array.
 *
 * @param int    $projectID        Post id of this project post.
 * @param string $projectMetaField CMB2 id of the field created.
 */
function populate_post_meta_array( $projectID, $projectMetaField ) {
	return get_post_meta( $projectID, $projectMetaField, true );
}
foreach ( $meta_fields as $key => $metafield ) {
	$postMeta[ $metafield ] = populate_post_meta_array( $projectID, $metafield, true );
}
// The partnerInformation custom field will not be used as of 2019-08-21, but if I want to add it in the future I can just comment out the next line.
unset( $postMeta['partnerInformation'] );
$project = array_merge( $postData, $postMeta );



$featured_image_id            = $project['_thumbnail_id'];
// Add more information about the featured image to the $project array.
$project['featuredImageData'] = get_attachment_info( $featured_image_id );

$projectAddressArray = $project['projectLocation'];
pr( $project );
?>
<style>
#project-address:before {
	content: "Project Address";
	display: block;
	color:white;
	background: #0273b9;
	padding-left: 40vw;
}
#project-address > span {
	margin-left: 40vw;

}
#google-map {
	width: 100vw;
	height: 40vh;
	background: orangered;
	background-image: url(<?php echo $project['featuredImageData']['src']; ?>);
	background-size: contain;
	background-blend-mode:	darken;
}
</style>

<?php
/**
 * Output the project address in the html of the page.
 *
 * @param array $projectAddressArray The fields that contain address informaiton for the project.
 */
function output_project_address( $projectAddressArray ) {
	$a                = $projectAddressArray;
	$streetAddressOne = $a['address-1'];
	$streetAddressTwo = $a['address-2'];
	$city             = $a['city'];
	$state            = $a['state'];
	$zip              = $a['zip'];
	$latitude         = $a['latitude'] ?? 'default';
	$longitude        = $a['longitude'] ?? 'default';
	$address = '<div id="project-address">';
	if ( $streetAddressOne ) {
		$address .= output_inside_span( $streetAddressOne, $attributes = [ 'class' => 'address', 'alt' => 'project street address' ] );
	}
	if ( $streetAddressTwo ) {
		$address .= '<br>' . output_inside_span( $streetAddressTwo, $attributes = [ 'class' => 'address', 'alt' => 'project street address line two' ] );
	}
	$address .= '<br>';
	if ( $city && $state && $zip ) {
		$address .= '<span class="city-state-zip">' . $city . ', ' . $state . ' ' . $zip . '</span>';
	}


	$address .= '<div><!-- end div#project-address -->';
	return $address;
}

echo output_project_address( $projectAddressArray );


?>


	<main id="primary" class="site-main">
	<div id="google-map">
	</div>
	<h2>this is a 'project' post type specific template for single project profiles</h2>
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry', get_post_type() );
			}

			if ( ! is_singular() ) {
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header();

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
			<div class="card__container card__container--closed">
				<!--<svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 500" preserveAspectRatio="xMidYMid slice">-->
				<svg
				class="card__image"
				xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink"
				viewBox="0 540 1920 500"
				preserveAspectRatio="xMidYMid slice"
				>
					<defs>
						<clipPath id="clipPath$i">
							<!-- r = 992 = hyp = Math.sqrt(960*960+250*250) -->
							<circle class="clip" cx="960" cy="250" r="992"></circle>-->
							<!-- r = 1101 = hyp = Math.sqrt(960*960+540*540)-->
							<circle
							class="clip"
							cx="960"
							cy="400"
							r="1101">
							</circle>
						</clipPath>
					</defs>
					<!--<image clip-path="url(#clipPath$i)" width="1920" height="500" xlink:href="wp-content/themes/wprig/pluggable/cardexpansion/img/a.jpg"></image>-->
					<!--<image clip-path="url(#clipPath$i)" width="1920" height="500" xlink:href="$img"></image>-->
					<!-- works to cover the whole top!!	<image clip-path="url(#clipPath$i)" width="1920" height="1080" xlink:href="$img"></image> -->
					<image
					clip-path="url(#clipPath$i)"
					width="1920"
					height="1080"
					xlink:href="$img">
					</image>
				</svg>
				<div
				class="card__content"
				style=""
				 >
					<i class="card__btn-close fa fa-times" title="Click to close this & return to the frontpage"></i>
					<div class="card__caption">
						<h2 class="card__title">$i $name...</h2>
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

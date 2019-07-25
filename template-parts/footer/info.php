<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<a href="<?php echo esc_url( __( 'https://jonessign.com/', 'wp-rig' ) ); ?>" title="link to the jonessign.com home page">
		<?php
		$thisyear = esc_attr( date( 'Y' ) );
		/* translators: %s: CMS name, i.e. WordPress. */
		printf( esc_html__( '%1$1s - %2$2s', 'wp-rig' ), 'Jones Sign Company', esc_attr( $thisyear ) );
		?>
	</a>
	<span class="sep"> | </span>
	<?php
	printf(
		/* translators: Theme name. */
		esc_html__( 'Theme: %1$1s from  %2$2s.', 'wp-rig' ),
		'<a href="' . esc_url( 'https://github.com/nickmortensen/jonessign/' ) . '">jonessign</a>',
		'nick mortensen'
	);

	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '<span class="sep"> | </span>' );
	}
	?>
</div><!-- .site-info -->

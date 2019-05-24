<?php
/**
 * Template part for displaying the search form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

	<label class="assistive-text" for="s"><?php esc_html_e( 'Search', 'wprig' ); ?></label>

	<div class="input-group">

	<form role="search" method="get" class="search-form" action="<?php echo esc_url( whome_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">
		<?php
			// phpcs:ignore 
			echo _x( 'Search for:', 'label' ); 
		?>
		</span>
		<input type="search" class="search-field"
	   placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label' ); ?>" />
	</label>
	<input type="submit" class="search-submit"
		value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>

	</div><!-- end div.input-group -->

</form><!-- end form#searchform -->

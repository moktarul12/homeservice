<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package Car_Repair_Services
 */



$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="form-inline" id='searchform' action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" placeholder="<?php esc_attr_e( 'Search','cleaning-services' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="button"><i class="icon-search"></i></button>
</form>
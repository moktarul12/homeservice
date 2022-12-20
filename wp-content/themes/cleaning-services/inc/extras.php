<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cleaning_Services
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cleaning_services_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.

	$cleaning_services = cleaning_services_options();

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( isset( $cleaning_services['cleaning_services-header-type'] ) && $cleaning_services['cleaning_services-header-type'] == '2' ) {
		$classes[] = 'cleaning-demo-two';
	}

	return $classes;
}

add_filter( 'body_class', 'cleaning_services_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cleaning_services_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}

add_action( 'wp_head', 'cleaning_services_pingback_header' );

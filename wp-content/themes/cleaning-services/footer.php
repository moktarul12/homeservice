<?php
$cleaning_services = cleaning_services_options();
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleaning Service
 */

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	if ( isset( $cleaning_services['elementor_on_off'] ) && $cleaning_services['elementor_on_off'] == '1' ) {
		get_template_part( 'template-parts/footer/footer-elementor' );
	} elseif ( isset( $cleaning_services['cleaning_services-footer-type'] ) && $cleaning_services['cleaning_services-footer-type'] == '2' ) {
		get_template_part( 'template-parts/footer/footer', '2' );
	} else {
		get_template_part( 'template-parts/footer/footer', '1' );
	}
}
wp_footer(); ?>
</body>
</html>

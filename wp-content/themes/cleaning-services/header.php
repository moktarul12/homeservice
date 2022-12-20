<?php
$cleaning_services = cleaning_services_options();
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleaning_Services
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) { // since 4.3.0
			wp_site_icon();
		} else {
			if ( isset( $cleaning_services['cleaning_services-site-favicon']['url'] ) && ! empty( $cleaning_services['cleaning_services-site-favicon']['url'] ) ) {
				?>
			<link rel="shortcut icon" href="<?php echo esc_url( $cleaning_services['cleaning_services-site-favicon']['url'] ); ?>" type="image/x-icon"/>
				<?php
			}
		}
		?>
		<?php wp_head(); ?>
	</head>
	<body  <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
	if ( isset( $cleaning_services['cleaning_services-preloader'] ) && $cleaning_services['cleaning_services-preloader'] == 1 ) {
		if ( isset( $cleaning_services['cleaning_services-preloader-text'] ) && $cleaning_services['cleaning_services-preloader-text'] != '' ) {
			$pre_text = esc_html( $cleaning_services['cleaning_services-preloader-text'] );
		} else {
			$pre_text = esc_html__( 'Cleaning Service', 'cleaning-services' );
		}
		?>
		<div class="loading-content">
			<div class="loaded-text" data-text="<?php echo esc_attr( $pre_text ); ?>">
				<?php echo esc_html( $pre_text ); ?>
			</div>
		</div>
		<?php
	}
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		if ( isset( $cleaning_services['elementor_on_off_header'] ) && $cleaning_services['elementor_on_off_header'] == '1' ) {
			get_template_part( 'template-parts/header/header-elementor' );
		} elseif ( isset( $cleaning_services['cleaning_services-header-type'] ) && $cleaning_services['cleaning_services-header-type'] == '2' ) {
			get_template_part( 'template-parts/header/header', '2' );
		} else {
			get_template_part( 'template-parts/header/header', '1' );
		}
	}
	$show_breadcrumb = get_post_meta( get_the_ID(), 'framework_show_breadcrumb', true );
	if ( ! is_singular( 'cleaning_services' ) ) {
		if ( ! is_front_page() && ( $show_breadcrumb != 'off' ) ) :
			do_action( 'cleaning_services_breadcrumb' );
		endif;
	}

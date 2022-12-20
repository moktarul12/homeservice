<footer class="elementor-widget-footer">
<?php
$cleaning_services = cleaning_services_options();
if ( empty( $cleaning_services['footer_widget_elementor'] ) ) {
	echo '<p class="text-center info-text">Please Select One Elementor widget Template</p>';
} elseif ( class_exists( '\\Elementor\\Plugin' ) ) {
	if ( $cleaning_services['footer_widget_elementor'] && ! empty( $cleaning_services['footer_widget_elementor'] ) ) :
		$pluginElementor              = \Elementor\Plugin::instance();
			$cleaning_services_all_save_element = $pluginElementor->frontend->get_builder_content( $cleaning_services['footer_widget_elementor'] );
			echo do_shortcode( $cleaning_services_all_save_element );
	endif;
}
?>
</footer>

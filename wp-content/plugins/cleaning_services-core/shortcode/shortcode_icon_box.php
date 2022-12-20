<?php
class cleaning_IconBox {

	public static $colno, $mask, $style;
	public static function load() {
		add_shortcode( 'cleaning_services_icon_box_items', array( __CLASS__, 'cleaning_services_icon_carousel_items_func' ) );
		add_shortcode( 'cleaning_services_icon_box', array( __CLASS__, 'cleaning_services_icon_carousel_func' ) );
	}

	function cleaning_services_icon_carousel_func( $atts, $content = null ) {

		extract(
			shortcode_atts(
				array(
					'extra_class' => '',
				),
				$atts
			)
		);

		$changed_atts = shortcode_atts(
			array(
				'mobile_first'     => 'false',
				'slides_to_show'   => '1',
				'slides_to_scroll' => '1',
				'infinite'         => 'true',
				'autoplay'         => 'true',
				'rows_per'         => '2',
				'slides_per_row'   => '3',
				'autoplay_speed'   => '2000',
				'arrows'           => 'true',
				'dots'             => 'false',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_iconbox', $changed_atts );
		ob_start();
		$output  = '';
		$output .= '<div class="row text-icon-carousel ' . $extra_class . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		echo $output;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	function cleaning_services_icon_carousel_items_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'icon'        => '',
					'heading'     => '',
					// 'extra_class' => '',
					// 'icon_size' => '',
					// 'button_action' => 'modal',
					// 'modal_id' => 'appointmentForm',
					// 'popup_id' => '54',
					'call_action' => '',
				),
				$atts
			)
		);

		ob_start()
		?>
		<div class="col-sm-4 text-icon">
			<div class="text-icon-icon">
				<i class="icon <?php echo apply_filters( 'replace_icon_html', $atts ); ?>"></i>
			</div>
			<h5 class="text-icon-title"><?php echo wp_kses_post( $heading ); ?></h5>
			<div class="text-icon-text">
				<?php echo wp_kses_post( $content ); ?>
			</div>
		</div>
		<?php
		$content = ob_get_clean();
		return $content;
	}

}

add_action( 'init', array( 'cleaning_IconBox', 'load' ) );


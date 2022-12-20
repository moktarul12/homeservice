<?php
class cleaning_ServiceShine {

	public function __construct() {
		add_shortcode( 'cleaning_services_shine_items', array( $this, 'cleaning_services_shine_items_func' ) );
		add_shortcode( 'cleaning_services_shine', array( $this, 'cleaning_services_shine_func' ) );
	}

	function cleaning_services_shine_func( $atts, $content = null ) {

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
				'mobile_first'     => 'true',
				'slides_to_show'   => '1',
				'slides_to_scroll' => '1',
				'infinite'         => 'true',
				'autoplay'         => 'true',
				'autoplay_speed'   => '2000',
				'arrows'           => 'true',
				'dots'             => 'false',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_bannershine', $changed_atts );

		ob_start();
		$output  = '';
		$output .= '<div class="services-circle-carousel ' . $extra_class . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		echo $output;
		$outputcontent = ob_get_contents();
		ob_end_clean();
		return $outputcontent;
	}

	function cleaning_services_shine_items_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'position' => 'one',
					'image'    => '',
					'link_url' => '',
				),
				$atts
			)
		);

		$href = vc_build_link( $link_url );

		ob_start();
		if ( $position === 'one' ) {
			?>
			<div class="services-circle-item pos-1">
				<a 
				<?php
				if ( $href['target'] ) {
					?>
					 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</a>
				<div class="services-circle-item-title"><?php echo wp_kses_post( $content ); ?></div>
			</div>

		<?php } elseif ( $position === 'two' ) { ?>
			<div class="services-circle-item pos-2">
				<a 
				<?php
				if ( $href['target'] ) {
					?>
					 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</a>
				<div class="services-circle-item-title"><?php echo wp_kses_post( $content ); ?></div>
			</div>
		<?php } elseif ( $position === 'three' ) { ?>
			<div class="services-circle-item pos-3">
				<a 
				<?php
				if ( $href['target'] ) {
					?>
					 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</a>
				<div class="services-circle-item-title">
					<?php echo $content; ?>
				</div>
			</div>  

		<?php } elseif ( $position === 'four' ) { ?>
			<div class="services-circle-item pos-4">
				<a 
				<?php
				if ( $href['target'] ) {
					?>
					 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</a>
				<div class="services-circle-item-title">
				<?php echo $content; ?>
					
				</div>
			</div>
		<?php } elseif ( $position === 'five' ) { ?>
			<div class="services-circle-item pos-5 hidden-sm">
				<div class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</div>
			</div>

			<?php
		} else {
			?>
			<div class="services-circle-item pos-6 hidden-sm">
				<div class="services-circle-item-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
				</div>
			</div>
			<?php
		}

		$outcontent = ob_get_clean();
		return $outcontent;
	}

}

new cleaning_ServiceShine();

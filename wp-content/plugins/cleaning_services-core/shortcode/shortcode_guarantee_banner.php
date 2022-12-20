<?php
class Cleaning_Services_GuaranteeBanner extends WPBakeryShortCode {

	public function __construct() {
		add_shortcode( 'cleaning_services_guarantee_banner', array( $this, 'cleaning_services_guarantee_banner_func' ) );
	}

	function cleaning_services_guarantee_banner_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title' => '',
					'image' => '',
				),
				$atts
			)
		);

		ob_start();
		?>
		<div class="banner-guarantee">
			<div class="banner-guarantee-img banner-guarantee-img--topnegative">
				<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
			</div>
			<div class="banner-guarantee-text">
				<h2><?php echo wp_kses_post( $title ); ?></h2>
				<p> <?php echo wp_kses_post( $content ); ?> </p>
			</div>
		</div>
		<?php
		$output = ob_get_clean();
		return $output;
	}

}

new Cleaning_Services_GuaranteeBanner();

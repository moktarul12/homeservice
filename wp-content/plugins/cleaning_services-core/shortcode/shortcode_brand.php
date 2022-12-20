<?php
class Cleaning_Services_BrandSlider extends WPBakeryShortCode {

	public function __construct() {
		add_shortcode( 'cleaning_services_brand_slider', array( $this, 'cleaning_services_brand_slider_func' ) );
		add_shortcode( 'cleaning_services_brand_slider_item', array( $this, 'cleaning_services_brand_slider_item_func' ) );
	}

	public function cleaning_services_brand_slider_func( $atts, $content = null ) {
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
				'slides_to_show'   => '7',
				'slides_to_scroll' => '1',
				'infinite'         => 'true',
				'autoplay'         => 'true',
				'autoplay_speed'   => '2000',
				'arrows'           => 'false',
				'dots'             => 'true',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_brandcarousel', $changed_atts );
		ob_start();
		?>
		<!-- Slider -->


		<div class="brand-carousel 
		<?php
		if ( $extra_class != '' ) {
			echo esc_attr( $extra_class );
		}
		?>
		">
		 <?php echo do_shortcode( $content ); ?>
		</div>  

		<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.brand-carousel').length) {
					$('.brand-carousel').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						variableWidth: true,
						responsive: [{
							breakpoint: 1199,
							settings: {
								slidesToShow: 6
							}
						}, {
							breakpoint: 767,
							settings: {
								slidesToShow: 5
							}
						}]
					});
				}
			});
		</script>

		<?php
		$output = ob_get_clean();
		return $output;
	}

	public function cleaning_services_brand_slider_item_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'image'       => '',
					'extra_class' => '',
					'unqid'       => '',
					'call_action' => '',
				),
				$atts
			)
		);
		$unqid       = $unqid . rand( 1, 999 );
		$attachement = wp_get_attachment_image_src( (int) $image, 'full' );
		$href        = vc_build_link( $call_action );
		// now we assing anmation style wise animation in different element
		ob_start();
		?>
		 <?php if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) : ?>
								<a href="<?php echo $href['url']; ?>" 
													<?php
													if ( ! ( empty( $href['target'] ) ) ) :
														?>
									 target="<?php echo $href['target']; ?>" <?php endif; ?>       rel="<?php echo $href['rel']; ?>"  >  
		  <?php endif; ?>
		   <img src="<?php echo esc_url( $attachement[0] ); ?>" alt="">
		<?php if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) : ?>
				   </a>           
		  <?php endif; ?>
 
		<?php
		return ob_get_clean();
	}

}

new Cleaning_Services_BrandSlider();

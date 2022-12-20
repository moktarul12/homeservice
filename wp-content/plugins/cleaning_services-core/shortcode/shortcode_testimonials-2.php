<?php
class cleaning_testimonials_2 {
	public function __construct() {
		add_shortcode( 'cleaning_testimonials_2', array( $this, 'cleaning_testimonials_2_func' ) );
		add_shortcode( 'cleaning_testimonials_items_2', array( $this, 'cleaning_testimonials_items_2_func' ) );
	}

	function cleaning_testimonials_2_func( $atts, $content = null ) {
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
				'autoplay_speed'   => '2000',
				'dots'             => 'true',
				'arrows'           => 'false',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_textimonials', $changed_atts );

		ob_start();
		?>
			<div class="block-testimonials-bg-2">
				<div class="testimonials-carousel arrows-center">
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					var rtltrue = jQuery('body').hasClass('rtl');
					if ($('.testimonials-carousel').length) {
						$('.testimonials-carousel').not('.slick-initialized').slick({
							mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
							slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
							slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
							infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
							autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
							autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
							rtl: rtltrue,
							arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
							dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
							cssEase: 'linear',
							responsive: [{
								breakpoint: 1199,
								settings: {
									arrows: false,
									dots: true
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

	function cleaning_testimonials_items_2_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'rev_name' => '',
					'rev_from' => '',
					'ratting'  => '4',
					'image'    => '',
				),
				$atts
			)
		);

		$attachement_url = wp_get_attachment_image_src( (int) $image );
		ob_start();
		?>
		<div class="testimonial-item">
			<div class="testimonial-item-inside">
				<p><i><?php echo $content; ?></i></p>
			</div>
			<div class="testimonial-item-author">
				<img src="<?php echo esc_url( $attachement_url[0] ); ?>" alt="">
				<div><span class="testimonial-item-name"><?php echo $rev_name; ?></span> <span class="testimonial-item-position"><?php echo $rev_from; ?></span></div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

}

new cleaning_testimonials_2();



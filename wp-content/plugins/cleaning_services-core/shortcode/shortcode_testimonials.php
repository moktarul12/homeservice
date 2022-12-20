<?php
class cleaning_testimonials {
	public $style, $col_no;

	public function __construct() {
		add_shortcode( 'cleaning_testimonials', array( $this, 'cleaning_testimonials_func' ) );
		add_shortcode( 'cleaning_testimonials_items', array( $this, 'cleaning_testimonials_items_func' ) );
	}

	function cleaning_testimonials_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'style'       => 'grid',
					'col_no'      => '',
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
				'dots'             => 'false',
				'arrows'           => 'false',
			),
			$atts
		);

		if ( $style == 'slider1' || $style == 'slider2' ) {
			wp_localize_script( 'cleaning-services-custom', 'ajax_textimonials', $changed_atts );
		}

		$this->style  = $style;
		$this->col_no = $col_no;
		ob_start();
		if ( $this->style == 'grid' ) :
			$output  = '<div class="testimonials-grid">';
			$output .= do_shortcode( $content );
			$output .= '</div>';

		elseif ( $this->style == 'slider1' ) :
			$output  = '<div class="block fullwidth-bg inset-50 block-testimonials bottom-null">';
			$output .= '<div class="testimonials-carousel-1">';
			$output .= do_shortcode( $content );
			$output .= ' </div>';
			$output .= ' </div>';

		elseif ( $this->style == 'slider2' ) :
			$output  = '<div class="fullwidth-bg bg-cover block-testimonials-bg">';
			$output .= '<div class="testimonials-carousel">';
			$output .= do_shortcode( $content );
			$output .= ' </div>';
			$output .= ' </div>';

		else :

			$output  = '<div class="testimonials-grid">';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			$output .= '<div id="testimonialPreload"></div>
                    <div id="moreLoader" class="more-loader">
                    <img src="' . CLEANING_SERVICES_THEME_URI . '/images/ajax-loader.gif" alt=""></div>
                    <div class="text-center testiminials-page-btn">
                        <a class="btn view-more-testimonials" data-load="">
                    <i class="icon icon-lightning"></i>
                    <span>More Testimonials</span></a>
                    </div>';

		endif;
		$this->style  = 0;
		$this->col_no = 0;
		?>
		<script>
			 jQuery(document).ready(function($) {
				var rtltrue= jQuery('body').hasClass('rtl');
				if ($('.testimonials-carousel').length) {
					$('.testimonials-carousel').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: JSON.parse('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: JSON.parse('<?php echo $changed_atts['slides_to_scroll']; ?>'),
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
		   

				if ( $('.testimonials-carousel-1').length) {
					$('.testimonials-carousel-1').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: JSON.parse('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: JSON.parse('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						cssEase: 'linear',
						responsive: [{
							breakpoint: 1299,
							settings: {
								arrows: false,
								dots: true
							}
						}]
					});
				}

			}) 
		</script>
		<?php
		$output .= ob_get_clean();
		return $output;
	}

	function cleaning_testimonials_items_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					// 'title' => '',
					'rev_name' => '',
					'ratting'  => '4',
					'image'    => '',
				),
				$atts
			)
		);

		$attachement_url = wp_get_attachment_image( (int) $image, 'full' );
		$output          = '';
		if ( $this->style == 'grid' ) :
			$output .= '<div class="testimonial-item">
                            <div class="testimonial-item-inside">
                                <h5>' . wp_kses_post( $rev_name ) . '</h5>
                                <p>' . wp_kses_post( $content ) . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';
		elseif ( $this->style == 'slider1' ) :
			$output .= '<div class="testimonial-item slider-item">
                            <div class="testimonial-item-author" data-animation="zoomIn" data-animation-delay="0.5s">
                               ' . $attachement_url . '
                            </div>
                            <div class="testimonial-item-inside">
                                <h3>' . wp_kses_post( $rev_name ) . '</h3>
                                <p>' . wp_kses_post( $content ) . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';

		elseif ( $this->style == 'slider2' ) :
			$output .= '<div class="testimonial-item cutted">
                            <div class="testimonial-item-inside">
                                <h3>' . wp_kses_post( $rev_name ) . '</h3>
                                <p>' . wp_kses_post( $content ) . '</p>
                            </div>
                        </div>';

		else :
			$output .= '<div class="testimonial-item grid-item">
                            <div class="testimonial-item-inside">
                                <h5>' . wp_kses_post( $rev_name ) . '</h5>
                                <p>' . wp_kses_post( $content ) . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';

		endif;

		return $output;
	}

}

new cleaning_testimonials();



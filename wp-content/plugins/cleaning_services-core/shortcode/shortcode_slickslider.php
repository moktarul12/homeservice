<?php
class Cleaning_Services_SlickSlider extends WPBakeryShortCode {
	public static $slider_design;
	public function __construct() {
		add_shortcode( 'cleaning_services_slick_slider', array( $this, 'cleaning_services_slick_slider_func' ) );
		add_shortcode( 'cleaning_services_slick_slider_item', array( $this, 'cleaning_services_slick_slider_item_func' ) );
	}

	public function cleaning_services_slick_slider_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'navigation_type' => 0,
					'extra_class'     => '',
					'slider_select'   => 'design_1',
				),
				$atts
			)
		);

		$changed_atts = shortcode_atts(
			array(
				'autoplay'            => 'true',
				'autoplay_speed'      => '3000',
				'arrows'              => 'true',
				'dots'                => 'true',
				'fade'                => 'true',
				'pause_on_hover'      => 'true',
				'pause_on_dots_hover' => 'true',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_slickslider', $changed_atts );

		// print_r( $changed_atts['autoplay'] );

		self::$slider_design = $slider_select;
			$content         = str_replace( '<p>', '', $content );
			$content         = str_replace( '</p>', '', $content );
		ob_start();
		?>
		<!-- Slider -->
		<div id="mainSliderWrapper"  class="mainslider <?php echo esc_attr( $extra_class ); ?>">
			<div class="loading-content">
				<div class="loading-dots dark-gray">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</div>
			</div>
			<div id="mainSlider" >
				<?php echo do_shortcode( $content ); ?>
			</div>  
		</div>  
		<script>
			 // main slider
			jQuery(document).ready(function($) {
				setTimeout(function(){
				function doAnimations(elements) {
					var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
					elements.each(function() {
						var $this = $(this);
						var $animationDelay = $this.data('delay');
						var $animationType = 'animated ' + $this.data('animation');
						$this.css({
							'animation-delay': $animationDelay,
							'-webkit-animation-delay': $animationDelay
						});
						$this.addClass($animationType).one(animationEndEvents, function() {
							$this.removeClass($animationType);
						});
						if ($this.hasClass('animate')) {
							$this.removeClass('animation');
						}
					});
				}
				var rtltrue= jQuery('body').hasClass('rtl');
				if ( $('#mainSlider').length) {
					var $el = $('#mainSlider');
					$el.on('init', function(e, slick) {
						var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
						doAnimations($firstAnimatingElements);
					});
					$el.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
						var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
						var $animatingElements = $currentSlide.find('[data-animation]');
						doAnimations($animatingElements);
					});
					$el.not('.slick-initialized').slick({
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						fade: JSON.parse('<?php echo $changed_atts['fade']; ?>'),
						rtl: rtltrue,
						pauseOnHover: JSON.parse('<?php echo $changed_atts['pause_on_hover']; ?>'),
						pauseOnDotsHover: JSON.parse('<?php echo $changed_atts['pause_on_dots_hover']; ?>'),
					});
				}
				 }, 200);
			});
		</script>
		<?php

		$output = ob_get_clean();
		return $output;
	}
	public function cleaning_services_slick_slider_item_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'image'         => '',
					'extra_class'   => '',
					'unqid'         => '',
					'call_action'   => '',
					'call_action_2' => '',
					'first_title'   => '',
					'second_title'  => '',
				),
				$atts
			)
		);
		$unqid       = $unqid . rand( 1, 999 );
		$attachement = wp_get_attachment_image_src( (int) $image, 'full' );
		$href        = vc_build_link( $call_action );
		$href2       = vc_build_link( $call_action_2 );
		$content     = str_replace( '<p>', '', $content );
		$content     = str_replace( '</p>', '', $content );
		// now we assing anmation style wise animation in different element
		ob_start();
		?>
		<?php if ( self::$slider_design == 'design_2' ) { ?>
		<div class="slide">
			<div class="img--holder" 
			<?php
			if ( $attachement != array() ) {
				?>
				  style="background-image: url(<?php echo esc_url( $attachement[0] ); ?>);" <?php } ?>></div>
			<div class="slide-content center">
				<div class="vert-wrap container">
					<div class="vert">
						<div class="container">
						   <?php
							if ( $content != '' ) {
								echo wp_kses_post( $content );
							}
							?>
							<?php
							$slider_title = '<h2 data-animation="zoomIn" data-animation-delay="0.5s">' . wp_kses_post( $first_title ) . '</h2>
                            <h3 data-animation="zoomIn" data-animation-delay="0.5s">' . wp_kses_post( $second_title ) . '</h3>';
							?>
							<?php echo apply_filters( 'cleaning_services_core_slider_titels', $slider_title, $first_title, $second_title ); ?>
							<?php if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) : ?>
								<a href="<?php echo $href['url']; ?>" 
													<?php
													if ( ! ( empty( $href['target'] ) ) ) :
														?>
									 target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
									<?php echo $href['title']; ?>   
								</a>
							<?php endif; ?>
							<?php if ( ! empty( $href2['url'] ) && ( $href2['url'] != '' ) ) : ?>
								<a href="<?php echo $href2['url']; ?>" 
													<?php
													if ( ! ( empty( $href2['target'] ) ) ) :
														?>
									 target="<?php echo $href2['target']; ?>" <?php endif; ?>    class="btn" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href2['rel']; ?>"  >   
									<?php echo $href2['title']; ?>   
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php
		} else {
			?>
		<div class="slide">
			<div class="img--holder" 
			<?php
			if ( $attachement != array() ) {
				?>
				  style="background-image: url(<?php echo esc_url( $attachement[0] ); ?>);" <?php } ?>></div>
			<div class="slide-content center">
				<div class="vert-wrap container">
					<div class="vert">
						<div class="container">
						
							<?php
							$slider_title = '<h2 data-animation="zoomIn" data-animation-delay="0.5s">' . wp_kses_post( $first_title ) . '</h2>
                            <h2 data-animation="zoomIn" data-animation-delay="0.5s">' . wp_kses_post( $second_title ) . '</h2>';
							?>
							<?php echo apply_filters( 'cleaning_services_core_slider_titels', $slider_title, $first_title, $second_title ); ?>
							<?php
							if ( $content != '' ) {
								echo wp_kses_post( $content );
							}
							?>
							<?php if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) : ?>
								<a href="<?php echo $href['url']; ?>" 
													<?php
													if ( ! ( empty( $href['target'] ) ) ) :
														?>
									 target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
									<?php echo $href['title']; ?>   
								</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	   <?php } ?>
		<?php
		return ob_get_clean();
	}
}
new Cleaning_Services_SlickSlider();

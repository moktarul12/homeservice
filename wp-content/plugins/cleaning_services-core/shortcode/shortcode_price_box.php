<?php
class cleaning_service_price {
	public static $design_select;
	public $col_no;

	public function __construct() {
		add_shortcode( 'cleaning_serivces_price', array( $this, 'cleaning_price_func' ) );
		add_shortcode( 'cleaning_services_price_item', array( $this, 'cleaning_services_price_item_func' ) );
	}

	public function cleaning_price_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'extra_class' => 0,
					'col_no'      => '1',
					'style'       => '1',
					'tabs_list'   => '',
					'arrows'      => 'true',
				),
				$atts
			)
		);

		$changed_atts = shortcode_atts(
			array(
				'mobile_first'     => 'false',
				'slides_to_show'   => '4',
				'slides_to_scroll' => '4',
				'infinite'         => 'false',
				'autoplay'         => 'true',
				'autoplay_speed'   => '2000',
				'dots'             => 'true',
				'arrows'           => 'true',
			),
			$atts
		);

		self::$design_select = $style;
		if ( $style == '2' ) {
			$class = 'price-carousel-2 price-carousel-3';
		} else {
			$class = 'price-carousel';
		}

		$tabs_list = vc_param_group_parse_atts( $tabs_list );

		wp_localize_script( 'cleaning-services-custom', 'ajax_priceslide', $changed_atts );
		ob_start();
		$this->col_no = $col_no;
		?>

	   <div class="<?php echo $class; ?>">
			<?php echo do_shortcode( $content ); ?>
		</div>
		<?php if ( $style == '2' ) { ?>
		<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.price-carousel-3').length) {
					$('.price-carousel-3').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						responsive: [{
							breakpoint: 991,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						}, {
							breakpoint: 767,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						}, {
							breakpoint: 500,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}]
					});
				}
			});
		</script>
		<?php } else { ?>
			<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.price-carousel').length) {
					$('.price-carousel').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						responsive: [{
							breakpoint: 991,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 3
							}
						}, {
							breakpoint: 767,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						}, {
							breakpoint: 500,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}]
					});
				}
			});
		</script>
		<?php } ?>

		<?php
		$output       = ob_get_clean();
		$this->col_no = 0;
		return $output;
	}

	public function cleaning_services_price_item_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title_text'      => '',
					'appartment_text' => '',
					'estimate_text'   => '',
					'call_action'     => '',
					'featured'        => 'false',
				),
				$atts
			)
		);

		$column_no = $this->col_no;
		if ( $featured == 'true' ) {
			$featured_clss = 'prices-box prices-box--primary';
		} else {
			$featured_clss = 'prices-box';
		}
		ob_start();
		?>
		<?php if ( self::$design_select == '2' ) { ?>
			<div class="col-md-3">
				<div class="<?php echo $featured_clss; ?>">
					<h3 class="prices-box-title"><?php echo wp_kses_post( $title_text ); ?></h3>
					<div class="prices-box-price">
					<?php echo wp_kses_post( $content ); ?>
					</div>
					<div class="prices-box-row"><span><?php echo wp_kses_post( $appartment_text ); ?></span></div>
					<div class="prices-box-row"><span><?php echo wp_kses_post( $estimate_text ); ?></span></div>
					<?php
						$href = vc_build_link( $call_action );
					if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) :
						?>
					<div class="prices-box-link">
						<a href="<?php echo $href['url']; ?>" 
											<?php
											if ( ! ( empty( $href['target'] ) ) ) :
												?>
							 target="<?php echo $href['target']; ?>" <?php endif; ?> class="btn"><?php echo $href['title']; ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		<?php } else { ?>
				<div class="prices-box">
					<h3 class="prices-box-title"><?php echo wp_kses_post( $title_text ); ?></h3>
					<div class="prices-box-price">
						<?php echo wp_kses_post( $content ); ?>
					</div>
					<div class="prices-box-row"><?php echo wp_kses_post( $appartment_text ); ?></div>
					<div class="prices-box-row"><?php echo wp_kses_post( $estimate_text ); ?></div>
					<?php
						$href = vc_build_link( $call_action );
					if ( ! empty( $href['url'] ) && ( $href['url'] != '' ) ) :
						?>
					<div class="prices-box-link">
						<a href="<?php echo $href['url']; ?>" 
											<?php
											if ( ! ( empty( $href['target'] ) ) ) :
												?>
							 target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn btn-sm" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
							<?php echo $href['title']; ?>   
							</a>
					</div>
					<?php endif; ?>
				</div>
		<?php } ?>
		<?php
		$content = ob_get_clean();
		return $content;
	}

}

new cleaning_service_price();

<?php
class price_box_tab {

	public $tab = array();

	public function __construct() {
		add_shortcode( 'price_box_tab', array( $this, 'price_box_tab_func' ) );
		add_shortcode( 'price_box_tab_container', array( $this, 'price_box_tab_container_func' ) );
		add_shortcode( 'price_box_tab_item', array( $this, 'price_box_tab_item_func' ) );
	}

	public function price_box_tab_container_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'extra_class' => '',
				),
				$atts
			)
		);
		$text = do_shortcode( $content );

		$changed_atts = shortcode_atts(
			array(
				'mobile_first' => 'false',
				'infinite'     => 'true',
				'autoplay'     => 'false',
				'dots'         => 'true',
				'arrows'       => 'false',
			),
			$atts
		);
		wp_localize_script( 'cleaning-services-custom', 'ajax_priceslide_tab', $changed_atts );

		ob_start();
		?>
		<div class="nav-tabs-wrap text-center">
			<ul class="nav nav-tabs nav-tabs--rounded">
			<?php
			$i = 0;
			foreach ( $this->tab as $item ) {
				$i++;
				?>
					<li 
				<?php
				if ( $i == 1 ) {
					?>
						class="active"<?php } ?>><a data-toggle="tab" href="#plan<?php echo $i; ?>"><?php echo $item; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="tab-content tab-content-nopad">
				<?php echo $text; ?>
		</div>
		<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.price-carousel-tab').length) {
					$('.price-carousel-tab').not('.slick-initialized').slick({
						mobileFirst: JSON.parse('<?php echo $changed_atts['mobile_first']; ?>'),
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: 2500,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						rtl: rtltrue,
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
			<?php
			$output = ob_get_clean();
			return $output;
	}

	public function price_box_tab_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'tab_title' => '',
				),
				$atts
			)
		);

		$this->tab[] = $tab_title;
		ob_start();
		?>
		<?php
		$i = 0;
		foreach ( $this->tab as $item ) {
			$i++;
		}
		?>
		<div id="plan<?php echo $i; ?>" class="tab-pane fade in 
								<?php
								if ( $i == 1 ) {
									echo 'active';
								}
								?>
		">
			<div class="price-row price-carousel-tab price-carousel-2">
				<?php echo do_shortcode( $content ); ?>
			</div>
		</div>



		<?php
		$output = ob_get_clean();
		return $output;
	}

	public function price_box_tab_item_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title_text'  => '',
					'tabs'        => '',
					'call_action' => '',
					'featured'    => 'false',
				),
				$atts
			)
		);
		$tabs_list = vc_param_group_parse_atts( $tabs );
		if ( $featured == 'true' ) {
			$featured_clss = 'prices-box prices-box--primary';
		} else {
			$featured_clss = 'prices-box';
		}
		ob_start();
		?>
		<div class="col-md-6 col-lg-4">
			<div class="<?php echo $featured_clss; ?>">
				<h3 class="prices-box-title"><?php echo wp_kses_post( $title_text ); ?></h3>
				<div class="prices-box-price">
					<?php echo wp_kses_post( $content ); ?>
				</div>
				<?php foreach ( $tabs_list as $item ) { ?>
					<div class="prices-box-row"><span><?php echo wp_kses_post( $item['title'] ); ?></span></div>
				<?php } ?>
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
		<?php
		$content = ob_get_clean();
		return $content;
	}

}

new price_box_tab();

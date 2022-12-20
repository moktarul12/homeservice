<?php
class Cleaning_Services_Slider extends WPBakeryShortCode {

	public function __construct() {
		add_shortcode( 'cleaning_services_slider', array( $this, 'cleaning_services_slider_func' ) );
		add_shortcode( 'cleaning_services_slider_items', array( $this, 'cleaning_services_slider_items_func' ) );

	}

	function cleaning_services_slider_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'extra_class'  => '',
					'service_type' => '1',
				),
				$atts
			)
		);

			$changed_atts = shortcode_atts(
				array(
					'slides_to_show'   => '3',
					'slides_to_scroll' => '1',
					'infinite'         => 'true',
					'autoplay'         => 'true',
					'autoplay_speed'   => '2500',
					'arrows'           => 'true',
					'dots'             => 'false',
				),
				$atts
			);

			wp_localize_script( 'cleaning-services-custom', 'ajax_serviceSlider', $changed_atts );

		ob_start();

		if ( $service_type == '2' ) {
			$class = 'services-grid';
		} else {
			$class = 'services-carousel arrows-center';
		}

		?>

			<div class="row <?php echo $class; ?>">
			<?php echo do_shortcode( $content ); ?>
			</div>
			<?php if ( $service_type != '2' ) { ?>
			<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.services-carousel').length) {
					$('.services-carousel').not('.slick-initialized').slick({
						slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						responsive: [{
							breakpoint: 1299,
							settings: {
								dots: true,
								arrows: false
							}
						},{
							breakpoint: 991,
							settings: {
								slidesToShow: 2,
								dots: true,
								arrows: false
							}
						},{
							breakpoint: 767,
							settings: {
								slidesToShow: 2,
								dots: true,
								arrows: false
							}
						},{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								dots: true,
								arrows: false
							}
						}]
					});
				}
			});
		</script>
		<?php } ?>
		<?php

		$output = ob_get_clean();
		return $output;
	}

	public function cleaning_services_slider_items_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title'       => 'Apartment Cleaning',
					'icon'        => '',
					'icon_img'    => '',
					'list'        => '',
					'call_action' => '',
					'extra_class' => '',
				),
				$atts
			)
		);
		 $href    = vc_build_link( $call_action );
		 $list    = vc_param_group_parse_atts( $list );
		 $img_url = wp_get_attachment_image_src( $icon_img );
						// print_r($url);
		  ob_start();
		?>

		<div class="col-sm-2 col-lg-4">
			<div class="service-card">
				<div class="service-card-icon">
				<?php
				if ( $img_url != '' ) {
					?>
						<img src="<?php echo esc_url( $img_url[0] ); ?>" alt="image" />
					<?php } else { ?>
						<i class="icon <?php echo apply_filters( 'replace_icon_html', $atts ); ?>"></i>
					<?php
					}
					?>
				
				</div>
				<h5 class="service-card-title"><?php echo $title; ?></h5>
				<ul class="service-card-list">
				<?php foreach ( $list as $item ) { ?>
					<li><?php echo wp_kses_post( $item['list_item'] ); ?></li>
				<?php } ?>
				</ul>
				<?php if ( $href['url'] != '' ) { ?>
				<a href="<?php echo esc_url( $href['url'] ); ?>" class="btn btn-border"><?php echo $href['title']; ?></a>
				<?php } ?>
			</div>
		</div>

		<?php
		 $content = ob_get_clean();
		return $content;
	}
}
new Cleaning_Services_Slider();

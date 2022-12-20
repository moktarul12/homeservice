<?php
class Cleaning_Services_NewsSlider extends WPBakeryShortCode {

	public static $design_select;
	public function __construct() {
		add_shortcode( 'cleaning_services_news_slider', array( $this, 'cleaning_services_news_slider_func' ) );
		add_shortcode( 'cleaning_services_news_slider_item', array( $this, 'cleaning_services_news_slider_item_func' ) );
	}

	public function cleaning_services_news_slider_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'navigation_type' => 0,
					'design_select'   => '',
					'extra_class'     => '',
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
				'autoplay_speed'   => '2000',
				'dots'             => 'true',
				'arrows'           => 'true',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_newsslide', $changed_atts );

		self::$design_select = $design_select;

		if ( $design_select == '2' ) {
			$design_select = 'news-carousel news-carousel-2';
		} else {
			$design_select = 'news-carousel';
		}

		ob_start();

		?>
		<div class="<?php echo $design_select; ?>  row">
			<?php echo do_shortcode( $content ); ?>
		</div>
		<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.news-carousel').length) {
					$('.news-carousel').not('.slick-initialized').slick({
						slidesToShow: parseInt('<?php echo $changed_atts['slides_to_show']; ?>'),
						slidesToScroll: parseInt('<?php echo $changed_atts['slides_to_scroll']; ?>'),
						infinite: JSON.parse('<?php echo $changed_atts['infinite']; ?>'),
						autoplay: JSON.parse('<?php echo $changed_atts['autoplay']; ?>'),
						autoplaySpeed: parseInt('<?php echo $changed_atts['autoplay_speed']; ?>'),
						rtl: rtltrue,
						arrows: JSON.parse('<?php echo $changed_atts['arrows']; ?>'),
						dots: JSON.parse('<?php echo $changed_atts['dots']; ?>'),
						adaptiveHeight: true,
						responsive: [{
							breakpoint: 991,
							settings: {
								slidesToShow: 2
							}
						}, {
							breakpoint: 767,
							settings: {
								slidesToShow: 2
							}
						}, {
							breakpoint: 480,
							settings: {
								slidesToShow: 1
							}
						}]
					});
				}
			})
		</script>

		<?php
		$output = ob_get_clean();
		return $output;
	}

	public function cleaning_services_news_slider_item_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title'       => '',
					'image'       => '',
					'date'        => '',
					'link_url'    => '',
					'extra_class' => '',
				),
				$atts
			)
		);
		$href      = vc_build_link( $link_url );
		$sigle_img = wp_get_attachment_image_src( $image, 'large' );
		ob_start();
		?>

		<?php if ( self::$design_select == '2' ) { ?>
			<div class="col-sm-4">
				<div class="news-prw">
					<div class="news-prw-image">
						<a 
						<?php
						if ( $href['target'] ) {
							?>
							 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>">
							<img src="<?php echo esc_attr__( $sigle_img[0] ); ?>" alt="">
							<span><i class="icon-link"></i></span>
						</a>
					</div>
					<div class="news-prw-date"><?php echo esc_html__( $date ); ?></div>
					<h3 class="news-prw-title"><?php echo esc_html__( $title ); ?></h3>
					<p><?php echo esc_html__( $content ); ?></p>
					<a 
					<?php
					if ( $href['target'] ) {
						?>
						 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="btn btn-border">
						<?php echo esc_html__( 'Read more', 'cleaning_services-core' ); ?>
					</a>
				</div>
			</div>

		<?php } else { ?>

			<div class="col-sm-4">
				<div class="news-prw">
					<div class="news-prw-image">
						<img src="<?php echo esc_attr__( $sigle_img[0] ); ?>" alt="">
						<?php if ( isset( $href['url'] ) && $href['url'] != '' ) { ?>
							<a 
							<?php
							if ( $href['target'] ) {
								?>
								 target="<?php echo esc_url( $href['target'] ); ?>" <?php } ?> href="<?php echo esc_url( $href['url'] ); ?>" class="news-prw-link">
								<i class="icon-right-arrow"></i>
							</a>
						<?php } ?>
					</div>
					<div class="news-prw-date"><?php echo esc_html__( $date ); ?></div>
					<h4 class="news-prw-title"><?php echo esc_html__( $title ); ?></h4>
					<p><?php echo esc_html__( $content ); ?></p>
				</div>
			</div>

		<?php } ?>

		<?php
		$content = ob_get_clean();
		return $content;
	}
}

new Cleaning_Services_NewsSlider();

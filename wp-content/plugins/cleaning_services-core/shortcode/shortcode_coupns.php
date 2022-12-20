<?php
class cleaning_servicesCoupns {

	public function __construct() {
		add_shortcode( 'cleaning_serivces_coupns', array( $this, 'cleaning_serivces_coupns_func' ) );
	}

	public function cleaning_serivces_coupns_func( $atts, $content = null ) {

		// $cleaning_services=array();
		// if (!function_exists('cleaning_services_options')){
			$cleaning_services = cleaning_services_options();
		// }

		extract(
			shortcode_atts(
				array(
					'extra_class'   => '',
					'column'        => 2,
					'call_action'   => '',
					'per_page'      => -1,
					'design_select' => 'with_carousel',
				),
				$atts
			)
		);

		$changed_atts = shortcode_atts(
			array(
				'mobile_first'     => 'false',
				'slides_to_show'   => '2',
				'slides_to_scroll' => '1',
				'infinite'         => 'false',
				'autoplay'         => 'true',
				'autoplay_speed'   => '2000',
				'dots'             => 'true',
				'arrows'           => 'true',
			),
			$atts
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_coupon', $changed_atts );

		$orderby = 'DESC';
		$args    = array(
			'posts_per_page' => $per_page,
			'post_type'      => 'our_coupons',
			'orderby'        => $orderby,
			'no_found_rows'  => true,
		);

		$column_no = $column;
		switch ( (int) $column_no ) {
			case 2:
				$colclass = 'col-sm-6 col-xs-12';
				break;
			case 4:
				$colclass = 'col-md-3 col-sm-4 col-xs-12';
				break;
			default:
				$colclass = 'col-md-4 col-sm-4 col-xs-12';
				break;
		}

		$query = new WP_Query( $args );
		ob_start();
		if ( $design_select == 'without_carousel' ) {
			?>
		<div class="row">
		<?php } else { ?>
		<div class="row coupons-carousel">
			<?php
		}
		?>

			<?php
			if ( $query->have_posts() ) :

				while ( $query->have_posts() ) :
					$query->the_post();
					$post_id          = get_the_ID();
					$coupon_top_right = get_post_meta( get_the_ID(), 'framework-coupon-top-right', true );
					$coupon_middle    = get_post_meta( get_the_ID(), 'framework-coupon-middle', true );
					$coupon_title     = get_post_meta( get_the_ID(), 'framework-coupon-title', true );
					$coupon_ribbon    = get_post_meta( get_the_ID(), 'framework-coupon-ribbon', true );
					$coupon_date      = get_post_meta( get_the_ID(), 'framework-coupon-date', true );
					$logo_image       = get_post_meta( $post_id, 'framework-logo', false );
					?>

					<!--<div class="col-md-6">-->
					<div class="<?php echo esc_html__( $colclass ); ?>">
						<div class="coupon">
							<div class="coupon-inside">
								   <?php if ( isset( $cleaning_services['cleaning_services-coupns-bg-top']['url'] ) && $cleaning_services['cleaning_services-coupns-bg-top']['url'] ) { ?>
								<img src="<?php echo esc_url( $cleaning_services['cleaning_services-coupns-bg-top']['url'] ); ?>" class="coupon-top-bg" alt="">
							  
								<?php } ?>
								  <?php if ( isset( $cleaning_services['cleaning_services-coupns-bg-bottom']['url'] ) && $cleaning_services['cleaning_services-coupns-bg-bottom']['url'] ) { ?>
								 <img src="<?php echo esc_url( $cleaning_services['cleaning_services-coupns-bg-bottom']['url'] ); ?>" class="coupon-bot-bg" alt="">

								<?php } ?>
								<div class="coupon-logo">
									<?php
									if ( isset( $logo_image[0] ) && ! empty( $logo_image[0] ) ) {
										echo wp_get_attachment_image( $logo_image[0], 'full' );
									}
									?>
								</div>
								<div class="coupon-text-1"><?php echo wp_kses_post( $coupon_top_right ); ?></div>
								<div class="clearfix"></div>
								<div class="coupon-text-2"><?php echo wp_kses_post( $coupon_middle ); ?></div>
								<div class="coupon-text-3"><?php echo wp_kses_post( $coupon_title ); ?></div>
								<div class="coupon-ribbon"><?php echo wp_kses_post( $coupon_ribbon ); ?></div>
								<div class="coupon-text-3"><?php echo wp_kses_post( $coupon_date ); ?></div>
							</div>
							<div class="coupon-print"><i class="icon-printer"></i></div>
						</div>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
		<div class="text-center">
			<?php
			$href = vc_build_link( $call_action );
			if ( $href['url'] ) {
				?>
				<a href="<?php echo $href['url']; ?>" 
									<?php
									if ( ! ( empty( $href['target'] ) ) ) :
										?>
					 target="<?php echo $href['target']; ?>" <?php endif; ?>  class="btn" rel="<?php echo $href['rel']; ?>">   
					<?php esc_html_e( 'See All Coupons', 'cleaning_services-core' ); ?>
				</a>
				<?php
			}
			?>
		</div>
		<?php
		$output = ob_get_clean();
		return $output;
	}

}

new cleaning_servicesCoupns();

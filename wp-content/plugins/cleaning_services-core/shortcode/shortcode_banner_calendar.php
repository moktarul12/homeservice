<?php
class Cleaning_Services_Banner_Calendar extends WPBakeryShortCode {

	public function __construct() {
		add_shortcode( 'cleaning_services_banner_calendar', array( $this, 'cleaning_services_banner_calendar_func' ) );
	}

	function cleaning_services_banner_calendar_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title'        => '',
					'cover_front'  => '',
					'cover_back'   => '',
					'calendar_img' => '',
					'call_action'  => '',
					'action_title' => 'Get An Estimate',
				),
				$atts
			)
		);

		ob_start();
		$content = str_replace( '<p>', '', $content );
		$content = str_replace( '</p>', '', $content );
		?>
		<div class="get-banner-2">
			<div class="get-banner-calendar">
				<div class="calendar-cover">
					<div class="calendar-cover-front">
						<?php echo wp_get_attachment_image( (int) $cover_front, 'full' ); ?>
					</div>
					<div class="calendar-cover-back">
						<?php echo wp_get_attachment_image( (int) $cover_back, 'full' ); ?>
					</div>
				</div>
				<?php echo wp_get_attachment_image( (int) $calendar_img, 'full' ); ?>
			</div>
			<div class="get-banner-content">
				<div class="get-banner-text">
					<h2><?php echo wp_kses_post( $title ); ?></h2>
					<p><?php echo wp_kses_post( $content ); ?></p>
				</div>
				<div class="get-banner-button">
					<?php $href = vc_build_link( $call_action ); ?>
					<a href="<?php echo $href['url']; ?>" 
										<?php
										if ( ! ( empty( $href['target'] ) ) ) :
											?>
						 target="<?php echo $href['target']; ?>" <?php endif; ?>  class="btn btn-white btn-lg<?php // echo esc_html($extra_class); ?>" rel="<?php echo $href['rel']; ?>"  >   
						<i class="icon icon-bell"></i><?php echo wp_kses_post( $action_title ); ?>
					</a>
				</div>
			</div>
		</div>
		<?php
		$output = ob_get_clean();
		return $output;
	}

}

new Cleaning_Services_Banner_Calendar();

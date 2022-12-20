<?php
class cleaning_servicesTeam {
	public static $style;
	public $col_no, $mask;

	public function __construct() {
		add_shortcode( 'cleaning_services_team_carousel', array( $this, 'cleaning_services_team_carousel_func' ) );
		add_shortcode( 'cleaning_services_team', array( $this, 'cleaning_services_team_func' ) );
	}

	public function cleaning_services_team_carousel_func( $atts = array(), $content = null ) {
		extract(
			shortcode_atts(
				array(
					'team_col' => '4',
					'style'    => '1',
				),
				$atts
			)
		);

		$changed_atts = shortcode_atts(
			array(
				'mobile_first'     => 'false',
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

		wp_localize_script( 'cleaning-services-custom', 'ajax_teamcarousel', $changed_atts );

		self::$style = $style;

		if ( self::$style == '2' ) {
			$class = 'person-carousel-2';
		} else {
			$class = 'person-carousel';
		}

		$this->col_no = $team_col;
		$output       = '<div class="row  ' . $class . '">';
		$output      .= do_shortcode( $content );
		$output      .= '</div>';
		$this->col_no = 0;
		?>
		<?php if ( self::$style == '2' ) { ?>
			<script>
			jQuery(document).ready(function($) {
				var rtltrue = jQuery('body').hasClass('rtl');
				if ($('.person-carousel-2').length) {
					$('.person-carousel-2').not('.slick-initialized').slick({
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
								slidesToScroll: 1
							}
						}, {
							breakpoint: 767,
							settings: {
								slidesToShow: 1
							}
						}]
					});
				}
			});
		</script>
		<?php } ?>

			<?php
			return $output;
			?>

		<?php
	}

	public function cleaning_services_team_func( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'name'          => '',
					'designation'   => '',
					'image'         => '',
					'facebook_url'  => '',
					'twitter_url'   => '',
					'instagram_url' => '',
				),
				$atts
			)
		);

		$column_no = $this->col_no;
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

		ob_start();
		?>
		<?php if ( self::$style == '2' ) { ?>
			<div class="<?php echo $colclass; ?> person">
				<div class="person-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>
					<?php if ( $facebook_url != '' ) { ?>
					<ul class="social-list">
						<?php if ( $facebook_url != '' || $twitter_url != '' || $instagram_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $facebook_url ); ?>"><i class="icon-facebook-logo1"></i></a></li>
						<?php } ?>
						<?php if ( $twitter_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $twitter_url ); ?>"><i class="icon-twitter-logo1"></i></a></li>
						<?php } ?>
						<?php if ( $instagram_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $instagram_url ); ?>"><i class="icon-instagram-logo1"></i></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
				<h4 class="person-name"><?php echo wp_kses_post( $name ); ?></h4>
				<h6 class="person-position"><?php echo wp_kses_post( $designation ); ?></h6>
				<div class="person-divider"></div>
				<p class="person-text"><?php echo wp_kses_post( $content ); ?></p>
			</div>           
		<?php } else { ?>
			<div class="<?php echo $colclass; ?> person">
				<div class="person-img">
					<?php echo wp_get_attachment_image( (int) $image, 'full' ); ?>    
					<?php if ( $facebook_url != '' ) { ?>
					<ul class="social-list">
						<?php if ( $facebook_url != '' || $twitter_url != '' || $instagram_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $facebook_url ); ?>"><i class="icon-facebook-logo1"></i></a></li>
						<?php } ?>
						<?php if ( $twitter_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $twitter_url ); ?>"><i class="icon-twitter-logo1"></i></a></li>
						<?php } ?>
						<?php if ( $instagram_url != '' ) { ?>
						<li><a href="<?php echo esc_url( $instagram_url ); ?>"><i class="icon-instagram-logo1"></i></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
				<h3 class="person-name"><?php echo wp_kses_post( $name ); ?></h3>
				<h6 class="person-position"><?php echo wp_kses_post( $designation ); ?></h6>
				<div class="person-divider"></div>
				<p class="person-text"><?php echo wp_kses_post( $content ); ?></p>
			</div>
		<?php } ?>
		<?php
		return ob_get_clean();
	}

}

new cleaning_servicesTeam();

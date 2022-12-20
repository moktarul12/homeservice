<?php
namespace CleaningServiceAddons\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Affiliate_Office extends Widget_Base {


	public function get_name() {
		return 'clenaing_affiliate_office';
	}

	public function get_title() {
		return esc_html__( 'Affiliate Office', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'fa fa-cloud';
	}

	public function get_categories() {
		return array( 'cleaning_service' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'General', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'cleaning_service-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Affiliate Office #1', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'place',
			array(
				'label' => esc_html__( 'Place', 'cleaning_service-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'location',
			array(
				'label' => esc_html__( 'Phone', 'cleaning_service-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'fax',
			array(
				'label' => esc_html__( 'Fax', 'cleaning_service-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'email',
			array(
				'label' => esc_html__( 'Email', 'cleaning_service-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'cleaning_service-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'placeholder' => esc_html__( 'Type your description here', 'cleaning_service-core' ),

			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'cleaning_service-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'cleaning_service-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_url',
			array(
				'label'         => esc_html__( 'Url', 'cleaning_service-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'cleaning_service-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				),

			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'cleaning_service-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'cleaning_service-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'cleaning_service-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'cleaning_service-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'cleaning_service-core' ),
					),
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = $settings['title'];
		$place    = $settings['place'];
		$location = $settings['location'];
		$fax      = $settings['fax'];
		$email    = $settings['email'];
		$content  = $settings['content'];
		?>  
		<div class="address-box">
			<h3><?php echo $title; ?></h3>
			<div class="contact-info-sm">
				<i class="icon icon-map-marker"></i>
				<?php if ( ! empty( $place ) ) : ?>
					<b><?php echo $place; ?></b><br>
					<?php
				endif;
				if ( isset( $location ) && ! empty( $location ) ) {
					 echo esc_html__( 'Phone', 'cleaning-services' )
					?>
					 : 
					 <?php
						echo $location;
				}
				if ( isset( $fax ) && ! empty( $fax ) ) {
					?>
					<br> <?php echo esc_html__( 'Fax', 'cleaning-services' ); ?>: <?php echo $fax; ?>
					<?php
				}
				if ( isset( $email ) && ! empty( $email ) ) {
					?>
					<br> <?php echo esc_html__( 'Email', 'cleaning-services' ); ?>: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
					<?php
				}
				if ( $content != '' ) {
					?>
					<br><?php echo $content; ?><br>
				<?php } ?>
				<ul class="social-list social-list-sm">
					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_icon         = $item['item_icon'];
						$item_url          = $item['item_url']['url'];
						$item_url_external = $item['item_url']['is_external'] ? 'target="_blank"' : '';
						$item_url_nofollow = $item['item_url']['nofollow'] ? 'rel="nofollow"' : '';
						?>
					 
						<li>
							<a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></a>
						</li> 
						<?php $i++; } ?>
				</ul>
			</div>
		</div>
		<?php
	}
}

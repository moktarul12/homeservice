<?php
namespace CleaningServiceAddons\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Service_Contact_Info extends Widget_Base {


	public function get_name() {
		return 'contact_info_cleaningservice';
	}

	public function get_title() {
		return esc_html__( 'Contact Info', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'fa fa-rss-square';
	}

	public function get_categories() {
		return array( 'cleaning_service' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'cleaning_service-core' ),
			)
		);
		$this->add_control(
			'button_title',
			array(
				'label' => esc_html__( 'Button Title', 'cleaning_service-core' ),
				'type'  => Controls_Manager::TEXT,

			)
		);

		$this->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'cleaning_service-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'cleaning_service-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				),

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
			'item_contact_text',
			array(
				'label'       => esc_html__( 'Contact Text', 'cleaning_service-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,

				'placeholder' => esc_html__( 'Type your description here', 'cleaning_service-core' ),

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
		$settings             = $this->get_settings_for_display();
		$button_title         = $settings['button_title'];
		$button_link          = $settings['button_link']['url'];
		$button_link_external = $settings['button_link']['is_external'] ? 'target="_blank"' : '';
		$button_link_nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
		?>
		<div class="contact-box">
			<div class="contact-info-wrap sub-service-btn">
				<?php
				$i = 1;
				foreach ( $settings['items'] as $item ) {

					$item_icon         = $item['item_icon'];
					$item_contact_text = $item['item_contact_text'];
					?>
					<div class="contact-info">
						<?php
						\Elementor\Icons_Manager::render_icon(
							( $item_icon ),
							array(
								'aria-hidden' => 'true',
								'class'       => 'icon',
							)
						);
						?>
						<?php echo $item_contact_text; ?>
					</div> 
					<?php
					$i++;
				}
				?>
			</div>
			<a href="<?php echo esc_url( $button_link ); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="btn sub-btn"><i class="icon icon-bell"></i><?php echo $button_title; ?></a>
		</div>
		<?php
	}
}

<?php
namespace CleaningServiceAddons\Widgets;

use Composer\Installers\TuskInstaller;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Additional_Service extends Widget_Base {


	public function get_name() {
		return 'additional_service';
	}

	public function get_title() {
		return esc_html__( 'Additional Service', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'fa fa-database';
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
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Additional Services', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'button_title',
			array(
				'label'       => esc_html__( 'Button Title', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'All Services', 'cleaning_service-core' ),
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
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				),

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
			'item_list_content',
			array(
				'label'       => esc_html__( 'List Content', 'cleaning_service-core' ),
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
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Background', 'sds-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background', 'cleaning_service-core' ),
				'types'    => array( 'classic', 'gradient', 'video' ),
				'selector' => '{{WRAPPER}} .inset-lg-1',
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings             = $this->get_settings_for_display();
		$heading              = $settings['heading'];
		$button_title         = $settings['button_title'];
		$button_link          = $settings['button_link']['url'];
		$button_link_external = $settings['button_link']['is_external'] ? 'target="_blank"' : '';
		$button_link_nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
		?> 
		<div class="block fullwidth-bg inset-lg-1 bg-cover bg-mobile-right">
			<div class="container">
				<h2 class="text-center h-lg h-decor"><?php echo $heading; ?></h2>
				<div class="row services-list-row">
					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_list_content = $item['item_list_content'];

						if ( $i == '2' || $i == '1' ) :
							?>
						<div class="col-xs-6 col-sm-3">
							<ul class="marker-list">
									<?php echo $item_list_content; ?>
							</ul>
						</div>
							<?php if ( $i == '2' ) : ?>
						<div class="clearfix visible-xs"></div> 
								<?php
						endif;
endif;
						?>
						<?php if ( $i == '3' || $i == '4' ) : ?>
					<div class="col-xs-6 col-sm-3 collapse-col collapsed">
						<ul class="marker-list">
							<?php echo $item_list_content; ?>
						</ul>
					</div>
							<?php
					endif;
						$i++;}
					?>
				</div>
				<div class="text-center visible-xs">
					<div class="divider"></div>
					<?php if ( $button_link !== '' ) { ?>
					<a href="<?php echo esc_url( $button_link ); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="all-view" data-show-xs="collapse-col"><span><?php echo $button_title; ?></span></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}
}

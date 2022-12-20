<?php
namespace CleaningServiceAddons\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Company_History extends Widget_Base {


	public function get_name() {
		return 'company_history';
	}

	public function get_title() {
		return esc_html__( 'Company History', 'cleaning_service-core' );
	}

	public function get_icon() {
		return 'fa fa-medium';
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
			'layout',
			array(
				'label'   => __( 'Layout Style', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'One', 'cleaning_service-core' ),
					'2' => __( 'Two', 'cleaning_service-core' ),
				),
			)
		);
		$this->add_control(
			'heading_area',
			array(
				'label'        => __( 'Display Heading Area?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'cleaning_service-core' ),
				'label_off'    => __( 'Hide', 'cleaning_service-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'History of Cleaning Company', 'cleaning_service-core' ),
				'condition'   => array(
					'heading_area' => 'yes',
				),
			)
		);
		$this->add_control(
			'title_html_tag',
			array(
				'label'     => __( 'Title HTML Tag', 'cleaning_service-core' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'h1',
				'options'   => array(
					'h1'   => __( 'H1', 'cleaning_service-core' ),
					'h2'   => __( 'H2', 'cleaning_service-core' ),
					'h3'   => __( 'H3', 'cleaning_service-core' ),
					'h4'   => __( 'H4', 'cleaning_service-core' ),
					'h5'   => __( 'H5', 'cleaning_service-core' ),
					'h6'   => __( 'H6', 'cleaning_service-core' ),
					'div'  => __( 'div', 'cleaning_service-core' ),
					'span' => __( 'span', 'cleaning_service-core' ),
					'p'    => __( 'p', 'cleaning_service-core' ),
				),
				'condition' => array(
					'heading_area' => 'yes',
				),
			)
		);
		$this->add_control(
			'sub_heading',
			array(
				'label'       => esc_html__( 'Sub Heading', 'cleaning_service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Providing house and offices cleaning services for more than 10 years', 'cleaning_service-core' ),
			)
		);

		$this->add_control(
			'content_1',
			array(
				'label'       => esc_html__( 'Content 1', 'cleaning_service-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'placeholder' => esc_html__( 'Type your description here', 'cleaning_service-core' ),

			)
		);

		$this->add_control(
			'content_2',
			array(
				'label'       => esc_html__( 'Content 2', 'cleaning_service-core' ),
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
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'cleaning_service-core' ),
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
		$settings    = $this->get_settings_for_display();
		$layout      = $settings['layout'];
		$sub_heading = $settings['sub_heading'];
		$content_1   = $settings['content_1'];
		$content_2   = $settings['content_2'];
		?> 
		<?php if ( $layout == '1' ) { ?>
		<div class="block">
			<div class="container">
				<div class="text-center">
					<?php $this->cleaning_service_title(); ?>
					<h4><?php echo $sub_heading; ?></h4>
				</div>
				<div class="divider"></div>
				<div class="text-center max-900">
					<p class="p-lg"><?php echo $content_1; ?></p>
				</div>
				<p class="info"><i class="icon-write"></i><?php echo $content_2; ?></p>
				<div class="row">
					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_content = $item['item_content'];
						?>
					 
						<div class="col-sm-4">
							<p class="p-lg"><?php echo $item_content; ?></p>
						</div> 
						<?php
						$i++;
					}
					?>
				</div>
			</div>
		</div>
		<?php } elseif ( $layout == '2' ) { ?>
		<div class="block">
			<div class="container">
				<?php $this->cleaning_service_title_two(); ?>
				<h3 class="text-center"><?php echo $sub_heading; ?></h3>
				<p class="text-center"><?php echo $content_1; ?></p>
				<p class="info"><?php echo $content_2; ?></p>
				<div class="row">
				<?php
					$i = 1;
				foreach ( $settings['items'] as $item ) {
					$item_content = $item['item_content'];
					?>
					 
					<div class="col-sm-4">
					<?php echo $item_content; ?>
					</div>
					<?php
					$i++;
				}
				?>
				</div>
			</div>
		</div>
			<?php
		}
	}
	/**
	 * Render slider title output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	private function cleaning_service_title() {
		 $settings = $this->get_settings_for_display();

		if ( $settings['heading'] ) {
			$this->add_inline_editing_attributes( 'heading', 'none' );
			$this->add_render_attribute( 'heading', 'class', 'h-decor' );

			if ( $settings['heading'] ) {
				$title_tag = $settings['title_html_tag'];
				?>
				<<?php echo esc_html( $title_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( 'heading' ) ); ?>>
					<?php echo esc_attr( $settings['heading'] ); ?>
				</<?php echo esc_html( $title_tag ); ?>>
				<?php
			}
		}
	}
	private function cleaning_service_title_two() {
		 $settings = $this->get_settings_for_display();

		if ( $settings['heading'] ) {

			$this->add_inline_editing_attributes( 'heading', 'none' );
			$this->add_render_attribute( 'heading', 'class', 'h-decor text-center' );

			if ( $settings['heading'] ) {
				$title_tag = $settings['title_html_tag'];
				?>
				<<?php echo esc_html( $title_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( 'heading' ) ); ?>>
					<?php echo esc_attr( $settings['heading'] ); ?>
				</<?php echo esc_html( $title_tag ); ?>>
				<?php
			}
		}
	}
}

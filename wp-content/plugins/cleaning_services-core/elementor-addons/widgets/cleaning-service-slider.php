<?php
namespace CleaningServiceAddons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Core\Schemes;
use Elementor\Repeater;

class Cleaning_Service_Slider extends Widget_Base {


	public function get_name() {
		return 'cleaning_service_slider';
	}

	public function get_title() {
		return __( 'Cleaning Service Slider', 'cleaning_services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'cleaning_service' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'General Settings', 'cleaning_services-core' ),
			)
		);

		$this->add_control(
			'service_type',
			array(
				'label'   => __( 'Service Type', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Slider', 'cleaning_services-core' ),
					'2' => __( 'Grid', 'cleaning_services-core' ),
				),
			)
		);
		$this->add_control(
			'slides_to_show',
			array(
				'label'     => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 100,
				'default'   => 3,
				'condition' => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'slides_to_scroll',
			array(
				'label'     => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 100,
				'default'   => 1,
				'condition' => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'infinite',
			array(
				'label'        => __( 'Is infinite?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'        => __( 'Enable Autoplay?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'       => __( 'Autoplay Speed', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '2500', 'cleaning_services-core' ),
				'condition'   => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'arrows',
			array(
				'label'        => __( 'Enable Arrows?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array( 'service_type' => '1' ),
			)
		);
		$this->add_control(
			'dots',
			array(
				'label'        => __( 'Enable Dots?', 'cleaning_service-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => array( 'service_type' => '1' ),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_counter_item',
			array(
				'label' => __( 'Content Area', 'cleaning_service-core' ),
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
			'title_heading',
			array(
				'label'     => __( 'Title', 'cleaning_service-core' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'heading_area' => 'yes',
				),
			)
		);

		$this->add_control(
			'slider_title',
			array(
				'label'     => __( 'Title', 'cleaning_service-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'Our Cleaning Services', 'cleaning_service-core' ),
				'condition' => array(
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
					'slider_title!' => '',
					'heading_area'  => 'yes',
				),
			)
		);

		$this->add_control(
			'slider_content',
			array(
				'label'     => __( 'Content', 'cleaning_service-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'rows'      => 10,
				'default'   => __( 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, et. Lorem ipsum dolor sit amet.', 'cleaning_service-core' ),
				'condition' => array(
					'heading_area' => 'yes',
				),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Residential Cleaning', 'cleaning_services-core' ),
			)
		);

		$repeater->add_control(
			'slider_item_icon_type',
			array(
				'label'       => esc_html__( 'Icon Type', 'cleaning_service-core' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'toggle'      => false,
				'options'     => array(
					'none'  => array(
						'title' => esc_html__( 'None', 'cleaning_service-core' ),
						'icon'  => 'fa fa-ban',
					),
					'icon'  => array(
						'title' => esc_html__( 'Icon', 'cleaning_service-core' ),
						'icon'  => 'fa fa-star',
					),
					'image' => array(
						'title' => esc_html__( 'Image', 'cleaning_service-core' ),
						'icon'  => 'fa fa-picture-o',
					),
				),
				'default'     => 'none',
			)
		);

		$repeater->add_control(
			'icon',
			array(
				'label'     => __( 'Icon', 'cleaning_service-core' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'slider_item_icon_type' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'icon_image',
			array(
				'label'     => __( 'Image', 'cleaning_service-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'slider_item_icon_type' => 'image',
				),
			)
		);
		$repeater->add_control(
			'item_list',
			array(
				'label'       => __( 'List Item', 'cleaning_service-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'default'     => __(
					'<li>Hard surface floor cleaning</li>
				<li>Tile and grout cleaning</li>
				<li>Carpet Cleaning</li>',
					'cleaning_service-core'
				),
				'placeholder' => __( 'Type your description here', 'cleaning_service-core' ),
			)
		);
		$repeater->add_control(
			'item_link',
			array(
				'label'         => esc_html__( 'Button Link', 'cleaning_service-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'cleaning_service-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);
		$repeater->add_control(
			'button_title',
			array(
				'label'       => __( 'Button Title', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Read More', 'cleaning_services-core' ),
			)
		);

		$this->add_control(
			'add_slider_items',
			array(
				'label'       => esc_html__( '', 'cleaning_service-core' ),
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ title }}',
				'default'     => array(
					array(
						'title' => 'Residential Cleaning',
					),
					array(
						'title' => 'Window Cleaning',
					),
					array(
						'title' => 'Apartment Cleaning',
					),
				),
				'fields'      => $repeater->get_controls(),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$service_type     = $settings['service_type'];
		$add_slider_items = $settings['add_slider_items'];
		if ( $service_type == '2' ) {
			$class = 'services-grid';
		} else {
			$class = 'services-carousel arrows-center';
		}

		if ( $service_type == '1' ) :
			$slides_to_show   = $settings['slides_to_show'];
			$slides_to_scroll = $settings['slides_to_scroll'];
			$autoplay_speed   = $settings['autoplay_speed'];

			if ( $settings['infinite'] == 'yes' ) {
				$infiinite = true;
			} else {
				$infiinite = false;
			}

			if ( $settings['autoplay'] == 'yes' ) {
				$autoplay = true;
			} else {
				$autoplay = false;
			}

			if ( $settings['dots'] == 'yes' ) {
				$dots = true;
			} else {
				$dots = false;
			}

			if ( $settings['arrows'] == 'yes' ) {
				$arrows = true;
			} else {
				$arrows = false;
			}

			$changed_atts = array(
				'slidesToShow'   => $slides_to_show,
				'slidesToScroll' => $slides_to_scroll,
				'infinite'       => $infiinite,
				'autoplay'       => $autoplay,
				'autoplaySpeed'  => $autoplay_speed,
				'dots'           => $dots,
				'arrows'         => $arrows,
			);

		endif;
		?>
		<div class="block">
			<div class="container">
				<?php
					$this->cleaning_service_title();
				if ( ! empty( $settings['slider_content'] ) ) :
					?>
				<div class="text-center max-750">
					<p class="p-lg">
					<?php
					$this->cleaning_description();
					?>
					</p>
				</div>
				<?php endif; ?>
				<?php if ( $service_type == '1' ) { ?>
				<div class="row <?php echo $class; ?>" data-service='<?php echo wp_json_encode( $changed_atts ); ?>'>	
				<?php } else { ?>
					<div class="row <?php echo $class; ?>">
					<?php } ?>
				<?php
				foreach ( $add_slider_items as $item ) {
					$slider_item_icon_type = $item['slider_item_icon_type'];
					$button_title          = $item['button_title'];
					$item_list             = $item['item_list'];
					$title                 = $item['title'];
					$item_menu_link        = $item['item_link'];
					$item_menu_target      = $item['item_link']['is_external'] ? ' target="_blank"' : '';
					$item_menu_nofollow    = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<div class="col-sm-2 col-lg-4">
						<div class="service-card">
							<div class="service-card-icon">
							<?php
							if ( $slider_item_icon_type == 'image' ) {
								$icon_image     = ( $item['icon_image']['id'] != '' ) ? wp_get_attachment_image( $item['icon_image']['id'], 'full' ) : $item['icon_image']['url'];
								$icon_image_alt = get_post_meta( $item['icon_image']['id'], '_wp_attachment_icon_image_alt', true );

								if ( wp_http_validate_url( $icon_image ) ) {
									?>
										<img src="<?php echo esc_url( $icon_image ); ?>" alt=" <?php esc_attr( $icon_image_alt ); ?>">
									<?php
								} else {
									echo $icon_image;
								}
							} elseif ( $slider_item_icon_type == 'icon' ) {
														   $icon = $item['icon'];
								?>
									<i class="icon <?php echo $icon['value']; ?>"></i>
								<?php
							}
							?>
							
							</div>
							<h5 class="service-card-title"><?php echo $title; ?></h5>
							<?php echo $item_list; ?>
							<?php if ( $item_menu_link['url'] != '' ) { ?>
							<a href="<?php echo esc_url( $item_menu_link['url'] ); ?>" <?php echo $item_menu_target . ' ' . $item_menu_nofollow; ?> class="btn btn-border"><?php echo $button_title; ?></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>

		<?php
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

		if ( $settings['slider_title'] ) {
			$this->add_inline_editing_attributes( 'slider_title', 'none' );
			$this->add_render_attribute( 'slider_title', 'class', 'text-center h-lg h-decor' );

			if ( $settings['slider_title'] ) {
				$title_tag = $settings['title_html_tag'];
				?>
				<<?php echo esc_html( $title_tag ); ?> <?php echo wp_kses_post( $this->get_render_attribute_string( 'slider_title' ) ); ?>>
					<?php echo esc_attr( $settings['slider_title'] ); ?>
				</<?php echo esc_html( $title_tag ); ?>>
				<?php
			}
		}
	}
	/**
	 * Render slider description output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	private function cleaning_description() {
		$settings = $this->get_settings_for_display();

		$slider_content = $settings['slider_content'];

		if ( $slider_content ) {

				echo wp_kses_post( $slider_content );

		}

	}
}

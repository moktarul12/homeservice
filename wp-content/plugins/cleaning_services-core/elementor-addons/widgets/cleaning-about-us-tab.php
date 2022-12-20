<?php
namespace CleaningServiceAddons\Widgets;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
class Cleaning_About_Us_Tab extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning-about-us-tab';
    }

    public function get_title()
    {
        return esc_html__('Cleaning About Us Tab', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-th';
    }

    public function get_categories()
    {
        return array('cleaning_service');
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'general',
            array(
                'label' => esc_html__('General', 'cleaning_service-core'),
            )
        );
        $this->add_control(
            'heading_area',
            [
                'label' => __('Display Heading Area?', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'cleaning_service-core'),
                'label_off' => __('Hide', 'cleaning_service-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'title_heading',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::HEADING,
                'separator'             => 'before',
                'condition'             => [
                    'heading_area'    => 'yes',
                ]
            ]
        );

        $this->add_control(
            'about_title',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXT,
                'default'               => __('About Our Company', 'cleaning_service-core'),
                'condition'             => [
                    'heading_area'    => 'yes',
                ]
            ]
        );

        $this->add_control(
            'title_html_tag',
            [
                'label'                => __('Title HTML Tag', 'cleaning_service-core'),
                'type'                 => Controls_Manager::SELECT,
                'default'              => 'h1',
                'options'              => [
                    'h1'     => __('H1', 'cleaning_service-core'),
                    'h2'     => __('H2', 'cleaning_service-core'),
                    'h3'     => __('H3', 'cleaning_service-core'),
                    'h4'     => __('H4', 'cleaning_service-core'),
                    'h5'     => __('H5', 'cleaning_service-core'),
                    'h6'     => __('H6', 'cleaning_service-core'),
                    'div'    => __('div', 'cleaning_service-core'),
                    'span'   => __('span', 'cleaning_service-core'),
                    'p'      => __('p', 'cleaning_service-core'),
                ],
                'condition'             => [
                    'about_title!'    => '',
                    'heading_area'    => 'yes',
                ],
            ]
        );
        $this->add_control(
            'left_image',
            [
                'label'                 => __('Right Image', 'cleaning_service-core'),
                'type'                  => Controls_Manager::MEDIA,
                'default'               => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
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
			'item_title',
			array(
				'label'   => esc_html__( 'Tab Name', 'cleaning_service-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Some Words', 'cleaning_service-core' ),
			)
		);

		$repeater->add_control(
			'item_tab_template',
			array(
				'label'   => esc_html__( 'Tab Template', 'cleaning_service-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => get_elementor_library(),
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
			[
				'label' => esc_html__('Background', 'sds-elementor-addons'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'cleaning_service-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .bg-cover',
			]
		);

		$this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $left_image = ($settings["left_image"]["id"] != "") ? wp_get_attachment_image_url($settings["left_image"]["id"], "full") : $settings["left_image"]["url"];
        $left_image_alt = get_post_meta($settings["left_image"]["id"], "_wp_attachment_left_image_alt", true);

        $cleaning_pluginElementor = \Elementor\Plugin::instance();

        
?>
        <div class="block fullwidth-bg bg-cover inset-lg-3 pb-xs-0 block-1 mb-0">
            <div class="container">
                <div class="row zindex-1">
                    <div class="col-sm-7 col-lg-8">
                        <?php $this->cleaning_about_title();?>
                        <ul class="nav nav-tabs nav-tabs--sm">
                        <?php
                            $i = 1;
                            foreach ( $settings['items'] as $item ) {
                                if ( $i == 1 ) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                                $item_title        = $item['item_title'];
                                ?>
                                    <li class="<?php echo $active; ?>"><a data-toggle="tab" href="#about<?php echo $i; ?>" aria-expanded="true"><?php echo $item_title; ?></a></li>
                           <?php $i++; } ?>	
                        </ul>

                        <div class="tab-content tab-content-nopad">
                        <?php
                            $i = 1;
                            foreach ( $settings['items'] as $item ) {
                                if ( $i == 1 ) {
                                    $active = 'active in';
                                } else {
                                    $active = '';
                                }
                                $item_title        = $item['item_title'];
                                $item_tab_template = $item['item_tab_template'];
                                ?>
                                <div id="about<?php echo $i; ?>" class="tab-pane fade  <?php echo $active;?>">
                                     <?php echo $cleaning_pluginElementor->frontend->get_builder_content( $item_tab_template ); ?>
                                </div>
                                <?php $i++; } ?> 	
                        </div>
                    </div>
                </div>
                <div class="img-right-wrap">
                    <img src="<?php echo esc_url($left_image); ?>" alt="left Image" loading="lazy">
                </div>
            </div>
        </div>
        <?php
    }
    /**
     * Render about title output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    private function cleaning_about_title()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['about_title']) {
            
            $this->add_inline_editing_attributes('about_title', 'none');
            $this->add_render_attribute('about_title', 'class', 'h-lg');


            if ($settings['about_title']) {
                $title_tag = $settings['title_html_tag'];
        ?>
                <<?php echo esc_html($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('about_title')); ?>>
                    <?php echo esc_attr($settings['about_title']); ?>
                </<?php echo esc_html($title_tag); ?>>
<?php
            }
        }
    }
}

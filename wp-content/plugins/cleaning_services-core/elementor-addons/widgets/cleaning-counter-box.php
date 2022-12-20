<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Counter_Box extends Widget_Base
{

    public function get_name()
    {
        return 'counter_box_cleaning_service';
    }

    public function get_title()
    {
        return esc_html__('Counter Box', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-dashboard';
    }

    public function get_categories()
    {
        return ['cleaning_service'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
			'design_style',
			[
				'label' => __( 'Design Select', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( '1', 'cleaning_service-core' ),
					'2' => __( '2', 'cleaning_service-core' )
				]
			]
		);
        $this->add_control(
			'column_select',
			[
				'label' => __( 'Column Select', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  => __( '2 column', 'cleaning_service-core' ),
					'3' => __( '3 Column', 'cleaning_service-core' ),
					'4' => __( '4 Column', 'cleaning_service-core' )
				]
			]
		);
        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            ]
        );
        $this->add_control(
            'heading_area',
            [
                'label' => __('Display Heading Area?', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'cleaning_service-core'),
                'label_off' => __('Hide', 'cleaning_service-core'),
                'return_value' => 'yes',
                'default' => 'yes'
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
                'label_block' => true,
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
                'default'              => 'h2',
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
                ]
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $repeater->add_control(
            'item_counter_value_must_be_numeric',
            [
                'label' => esc_html__('Counter Value(must Be Numeric)', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $repeater->add_control(
            'symbol',
            [
                'label' => esc_html__('Unit Symbol', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );


        $repeater->add_control(
            'item_speed_must_be_numeric',
            [
                'label' => esc_html__('Speed(must Be Numeric)', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'item_author_image',
            [
                'label' => esc_html__('Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $repeater->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'cleaning_service-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );


        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core')
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section_slider',
			array(
				'label' => __( 'Settings', 'cleaning_services-core' )
			)
		);
		$this->add_control(
			'slides_to_show',
			[
				'label' => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1
				
			]
		);
		$this->add_control(
			'infinite',
			[
				'label' => __( 'Is infinite?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes'
				
			]
		);
        $this->add_control(
			'mobile_first',
			[
				'label' => __( 'Mobile First?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no'
				
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Enable Autoplay?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'       => __( 'Autoplay Speed', 'cleaning_services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '2500', 'cleaning_services-core' ),
			)
		);
		$this->add_control(
			'arrows',
			[
				'label' => __( 'Enable Arrows?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no'
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Background', 'cleaning_service-core'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );
    
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'cleaning_service-core' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .bg-cover'
            ]
        );
    
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();

        $design_style = $settings['design_style'];

        $extra_class = $settings['extra_class'];
        $extra_class_check = $extra_class ?? '';
        $column_no = $settings['column_select'];
		switch ( (int) $column_no ) {
			case 2:
				$colclass = 'col-sm-6 col-xs-12';
				break;
			case 4:
				$colclass = 'col-xs-6 col-sm-3';
				break;
			default:
				$colclass = 'col-md-4 col-sm-4 col-xs-12';
				break;
		}

        $slides_to_show = $settings['slides_to_show'];
        $slides_to_scroll = $settings['slides_to_scroll'];
        $autoplay_speed = $settings['autoplay_speed'];
        
        if($settings['infinite'] == 'yes'){
            $infiinite = 'true';
        }else{
            $infiinite = 'false';
        }

        if($settings['mobile_first'] == 'yes'){
            $mobile_class = 'true';
        }else{
            $mobile_class = 'false';
        }

        if($settings['autoplay'] == 'yes'){
            $autoplay = 'true';
        }else{
            $autoplay = 'false';
        }

        if($settings['dots'] == 'yes'){
            $dots = 'true';
        }else{
            $dots = 'false';
        }

        if($settings['arrows'] == 'yes'){
            $arrows = 'true';
        }else{
            $arrows = 'false';
        }


        $changed_atts = array(
            'mobile_first' => $mobile_class,
            'slides_to_show' => $slides_to_show,
            'slides_to_scroll' => $slides_to_scroll,
            'infinite' => $infiinite,
            'autoplay' => $autoplay,
            'autoplay_speed' => $autoplay_speed,
            'arrows' => $arrows,
            'dots' => $dots
        );
        wp_localize_script( 'cleaning-services-custom', 'ajax_numberslide', $changed_atts );


        if ( $design_style == '2' ) {
			$class = 'counter-row';
		} else {
			$class = 'numbers-carousel';
		}

        
    
    if ( $design_style == '2' ) { ?>
    <div class="block fullwidth-bg inset-lg-1 bg-cover js-bg-parallax <?php echo $extra_class_check;?>">
    <?php } else { ?>
        <div class="block">
            <?php } ?>
        <div class="container">
            <?php if ( $design_style !== '2' ) { 
             $this->cleaning_about_title();
             } ?>
       <div class="row <?php echo $class;?>">
            <?php 
            foreach ($settings["items"] as $item) {
                $item_title = $item["item_title"];
                $count_number = $item["item_counter_value_must_be_numeric"];
                $number_scrolling_speed = $item["item_speed_must_be_numeric"];
                $symble = $item["symbol"];
                $item_icon = $item["item_icon"];

                $item_author_image = ($item["item_author_image"]["id"] != "") ? wp_get_attachment_image($item["item_author_image"]["id"], "full") : $item["item_author_image"]["url"];
                $item_author_image_alt = get_post_meta($item["item_author_image"]["id"], "_wp_attachment_image_alt", true); ?>
            <div class="<?php echo esc_attr( $colclass ); ?>">
                <?php if ( $design_style == '2' ) { ?>
                    <div class="counter-item">
                        <div class="counter-item-icon"><?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true')); ?></div>
                        <span class="counter-item-number number"><span class="count" data-to="<?php echo esc_html( $count_number ); ?>" data-speed="<?php echo esc_html( $number_scrolling_speed ); ?>"><?php echo esc_html( $count_number ); ?></span><?php echo $symble; ?></span>
                        <div class="counter-item-text"><?php echo esc_html( $item_title ); ?></div>
                    </div>
                <?php } else { ?>
                    <div class="fact-item">
                        <div class="fact-item-image">
                            <?php
                                if (wp_http_validate_url($item_author_image)) {
                                    ?>
                                <img src="<?php echo esc_url($item_author_image); ?>" alt=" <?php esc_attr($item_author_image_alt); ?>">
                                <?php
                                } else {
                                    echo $item_author_image;
                                } ?>
                            <div class="fact-item-text-wrap">
                                <span class="fact-item-number number"><span class="count" data-to="<?php echo esc_html( $count_number ); ?>" data-speed=" <?php echo esc_html( $number_scrolling_speed ); ?>"> <?php echo esc_html( $count_number ); ?></span></span>
                                <div class="fact-item-text">
                                    <?php echo esc_html( $item_title ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            <?php } ?> 
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
            $this->add_render_attribute('about_title', 'class', 'text-center h-lg h-decor');


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

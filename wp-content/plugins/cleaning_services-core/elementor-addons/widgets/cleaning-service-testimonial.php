<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
class Cleaning_Services_Testimonials extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_services_testimonials';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Services Testimonials', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-archive';
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
                'label' => esc_html__('Testimonial Item', 'cleaning_service-core')
            ]
        );
        $this->add_control(
            'layout_style',
            [
                'label' => esc_html__('Layout Style', 'cleaning_service-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'grid'  => esc_html__('Grid', 'cleaning_service-core'),
                    'slider1'  => esc_html__('Slider Style One', 'cleaning_service-core'),
                    'slider2'  => esc_html__('Slider Style Two', 'cleaning_service-core'),
                    'load_more'  => esc_html__('Load More', 'cleaning_service-core')

                ],
                'default' => 'grid'


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
					'heading_area'    => 'yes'
				]
			]
		);

		$this->add_control(
			'testimonial_title',
			[
				'label'                 => __('Title', 'cleaning_service-core'),
				'type'                  => Controls_Manager::TEXT,
				'default'               => __('Our Cleaning Services', 'cleaning_service-core'),
				'condition'             => [
					'heading_area'    => 'yes'
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
					'testimonial_title!'    => '',
					'heading_area'    => 'yes'
				]
			]
		);
		
		$this->add_control(
			'testimonial_content',
			[
				'label' => __('Sub Heading', 'cleaning_service-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __('We are pleased to share the testimonials of our satisfied customers', 'cleaning_service-core'),
				'condition'             => [
					'heading_area'    => 'yes'
				]
			]
		);
        $this->add_control(
			'extra_class',
			[
				'label'                 => __('Extra Class', 'cleaning_service-core'),
				'label_block' => true,
                'type' => Controls_Manager::TEXT
                
				
			]
		);
        $repeater = new Repeater();

        $repeater->add_control(
            'item_reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Shirley R. Sanchez.', 'cleaning_service-core')
            ]
        );


        $repeater->add_control(
            'item_review_text',
            [
                'label' => esc_html__('Review Text', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA
                
            ]
        );


        $repeater->add_control(
            'item_ratting',
            [
                'label' => esc_html__('Ratting', 'cleaning_service-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5

            ]
        );

        $repeater->add_control(
            'item_author_image',
            [
                'label' => esc_html__('Author Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

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
            'section_container_style',
            [
                'label' => __('Form Container', 'cleaning_service-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cleaning_contact_form_background',
                'label' => __('Background', 'cleaning_service-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .block-testimonials-bg'
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
				'default' => 'no',
				
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
				'default'     => __( '2500', 'cleaning_services-core' )
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
        
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $layout_style = $settings["layout_style"];
        $extra_class = $settings["extra_class"];

        $extra_class_data = $extra_class ?? '';

        $slides_to_show = $settings['slides_to_show'];
        $slides_to_scroll = $settings['slides_to_scroll'];
        $autoplay_speed = $settings['autoplay_speed'];
        
        if($settings['infinite'] == 'yes'){
            $infiinite = true;
        }else{
            $infiinite = false;
        }

        if($settings['mobile_first'] == 'yes'){
            $mobile_class = true;
        }else{
            $mobile_class = false;
        }

        if($settings['autoplay'] == 'yes'){
            $autoplay = true;
        }else{
            $autoplay = false;
        }

        if($settings['dots'] == 'yes'){
            $dots = true;
        }else{
            $dots = false;
        }

        if($settings['arrows'] == 'yes'){
            $arrows = true;
        }else{
            $arrows = false;
        }

        $changed_atts = array(
            'mobileFirst'       => $mobile_class,
            'slidesToShow'      => $slides_to_show,
            'slidesToScroll'    => $slides_to_scroll,
            'infinite'          => $infiinite,
            'autoplay'          => $autoplay,
            'autoplaySpeed'     => $autoplay_speed,
            'dots' => $dots,
            'arrows' => $arrows
        );           
        if ($layout_style == 'grid') : ?>
            <div class="block <?php echo $extra_class_data;?>">
                <div class="container">
                    <?php $this->cleaning_service_title();?>
                    <h3 class="text-center"><?php $this->cleaning_description();?></h3>
                    <div class="divider"></div>
                    <div class="testimonials-grid testimonials-grid--first">
                        <?php $this->testimonial_item_function();?>

                    </div>
                </div>
            </div>
        <?php elseif ($layout_style == 'slider1') : ?>
                <div class="block fullwidth-bg inset-50 block-bg-grey block-testimonials bottom-null">
                    <div class="container">
                        <div class="block fullwidth-bg inset-50 block-testimonials bottom-null">
                            <div class="testimonials-carousel-1" id="testimonials-carousel-custom" data-testimonialtwo='<?php echo wp_json_encode($changed_atts);?>'>
                                <?php $this->testimonial_item_function();?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php elseif ($layout_style == 'slider2') : ?>
            <div class="block fullwidth-bg inset-50 bg-cover block-testimonials-bg home-testimonials-text">
                <div class="container">
                    <?php $this->cleaning_service_title();?>
                    <div class="testimonials-carousel" id="testimonials-carousel-custom2" data-testimonial='<?php echo wp_json_encode($changed_atts);?>'>
                        <?php $this->testimonial_item_function();?>
                    </div>
                    
                </div>
            </div>
        <?php else : ?>
            <div class="block">
                <div class="container">
                    <div class="testimonials-grid">
                        <?php $this->testimonial_item_function();?>
                    </div>
                    <div id="testimonialPreload"></div>
                    <div id="moreLoader" class="more-loader">
                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/ajax-loader.gif'?>" alt="">
                    </div>
                    <div class="text-center testiminials-page-btn">
                        <a class="btn view-more-testimonials" data-load="">
                            <i class="icon icon-lightning"></i>
                            <span>More Testimonials</span></a>
                    </div>
                </div>
            </div>
<?php endif;
    }
    protected function testimonial_item_function()
    {

        $settings =  $this->get_settings_for_display();
        $layout_style = $settings["layout_style"];
        foreach ($settings["items"] as $item) {

            $item_reviewer_name = $item["item_reviewer_name"];
            $item_review_text = $item["item_review_text"];
            $item_ratting = $item["item_ratting"];
            if ($layout_style == 'slider1') {
                $item_author_image = ($item["item_author_image"]["id"] != "") ? wp_get_attachment_image($item["item_author_image"]["id"], "full") : $item["item_author_image"]["url"];
                $item_author_image_alt = get_post_meta($item["item_author_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ($layout_style == 'grid') : 
                echo  '<div class="testimonial-item">
                            <div class="testimonial-item-inside">
                                <h5>' . $item_reviewer_name . '</h5>
                                <p>' . $item_review_text . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $item_ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';
            elseif ($layout_style == 'slider1') :
               echo  '<div class="testimonial-item slider-item">
                            <div class="testimonial-item-author" data-animation="zoomIn" data-animation-delay="0.5s">'; ?>
                               <?php if (wp_http_validate_url($item_author_image)) {
                                    ?>
                                <img src="<?php echo esc_url($item_author_image); ?>" alt=" <?php esc_attr($item_author_image_alt); ?>">
                                <?php
                                } else {
                                    echo $item_author_image;
                                } 
                            echo  '</div>
                            <div class="testimonial-item-inside">
                                <h3>' . $item_reviewer_name . '</h3>
                                <p>' . $item_review_text . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $item_ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';

            elseif ($layout_style == 'slider2') :
                echo  '<div class="testimonial-item cutted">
                            <div class="testimonial-item-inside">
                                <h3>' . $item_reviewer_name . '</h3>
                                <p>' . $item_review_text . '</p>
                            </div>
                        </div>';

            else :
               echo '<div class="testimonial-item grid-item">
                            <div class="testimonial-item-inside">
                                <h5>' . $item_reviewer_name . '</h5>
                                <p>' . $item_review_text . '</p>
                                <div class="rating">
                                <span class="rating rating-' . $item_ratting . '">
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                <i class="icon-star-black"></i>
                                </span>
                                </div>
                            </div>
                        </div>';
            endif;
        }
    }
    /**
	 * Render slider title output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	private function cleaning_service_title()
	{
		$settings = $this->get_settings_for_display();

		if ($settings['testimonial_title']) {
			$this->add_inline_editing_attributes('testimonial_title', 'none');
			$this->add_render_attribute('testimonial_title', 'class', 'text-center h-decor');
			

			if ($settings['testimonial_title']) {
				$title_tag = $settings['title_html_tag'];
		?>
				<<?php echo esc_html($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('testimonial_title')); ?>>
					<?php echo esc_attr($settings['testimonial_title']); ?>
				</<?php echo esc_html($title_tag); ?>>
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
	private function cleaning_description()
	{
		$settings = $this->get_settings_for_display();
        

		$testimonial_content = $settings['testimonial_content'];
       
        echo wp_kses_post($testimonial_content);
	}
}

<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Testimonials_2 extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_testimonials_2';
    }

    public function get_title()
    {
        return esc_html__('Testimonials 2', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-intersex';
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
                'label' => esc_html__('Testimonial Item', 'cleaning_service-core'),
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Heading Text', 'cleaning_service-core'),
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
				],
				'condition'             => [
					'heading_area'    => 'yes'
				]
			]
		);
        $repeater = new Repeater();
        $repeater->add_control(
            'item_reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('David', 'cleaning_service-core')
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
            'item_review_position',
            [
                'label' => esc_html__('Position', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
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
				'return_value' => 'yes'
				
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
				'default' => 'yes',
			]
		);
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes'
			]
		);
		$this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
       

        $heading = $settings['heading'];
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
    ?> 
        <div class="block fullwidth-bg bg-cover block-testimonials-bg inset-lg-1">
            <div class="container">
                <?php if( $heading) : 
                 $this->cleaning_service_title(); endif;?>
                <div class="block-testimonials-bg-2">
                    <div class="testimonials-carousel arrows-center" data-testimonial='<?php echo wp_json_encode($changed_atts);?>'>
                    <?php 
                        foreach ($settings["items"] as $item) {

                            $item_reviewer_name = $item["item_reviewer_name"];
                            $item_review_text = $item["item_review_text"];
                            $item_review_position = $item["item_review_position"];
                            
                            $item_author_image = ($item["item_author_image"]["id"] != "") ? wp_get_attachment_image($item["item_author_image"]["id"], "full") : $item["item_author_image"]["url"];
                            $item_author_image_alt = get_post_meta($item["item_author_image"]["id"], "_wp_attachment_image_alt", true);
                        ?>
                        <div class="testimonial-item">
                            <div class="testimonial-item-inside">
                                <p><i><?php echo $item_review_text; ?></i></p>
                            </div>
                            <div class="testimonial-item-author">
                            <?php
                                if (wp_http_validate_url($item_author_image)) {
                                    ?>
                                <img src="<?php echo esc_url($item_author_image); ?>" alt=" <?php esc_attr($item_author_image_alt); ?>">
                                <?php
                                } else {
                                    echo $item_author_image;
                                } ?>
                                <div><span class="testimonial-item-name"><?php echo $item_reviewer_name; ?></span> <span class="testimonial-item-position"><?php echo $item_review_position;?></span> </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
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
	private function cleaning_service_title()
	{
		$settings = $this->get_settings_for_display();

		if ($settings['heading']) {
           
			$this->add_inline_editing_attributes('heading', 'none');
			$this->add_render_attribute('heading', 'class', 'text-center h-lg h-decor');

			if ($settings['heading']) {
				$title_tag = $settings['title_html_tag'];
		?>
				<<?php echo esc_html($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('heading')); ?>>
					<?php echo wp_kses_post($settings['heading']); ?>
				</<?php echo esc_html($title_tag); ?>>
			<?php
			}
		}
    }
}

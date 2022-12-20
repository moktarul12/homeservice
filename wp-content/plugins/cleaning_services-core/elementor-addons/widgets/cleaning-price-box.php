<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Price_Box extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_price_box';
    }

    public function get_title()
    {
        return esc_html__('Price Box', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-briefcase';
    }

    public function get_categories()
    {
        return ['cleaning_service'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__('General', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
			'layout',
			array(
				'label'   => __( 'Layout Style', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => array(
					'1' => __( 'One', 'cleaning_service-core' ),
					'2' => __( 'Two', 'cleaning_service-core' ),
				),
			)
		);
        $this->add_control(
			'column',
			[
				'label' => __( 'Column Select', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  => __( '2', 'cleaning_service-core' ),
					'3' => __( '3', 'cleaning_service-core' ),
					'4' => __( '4', 'cleaning_service-core' ),
				],
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
				'default' => 'yes',
			]
		);
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Discounts for Recurring Clientele', 'cleaning_service-core'),
                'condition'             => [
					'heading_area'    => 'yes',
				],
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
					'heading_area'    => 'yes',
				],
			]
		);
        


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),
                'condition'             => [
					'heading_area'    => 'yes',
				],

            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning_service-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title_text',
            [
                'label' => esc_html__('Title Text', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );


        $repeater->add_control(
            'item_price_content',
            [
                'label' => esc_html__('Price Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                
            ]
        );


        $repeater->add_control(
            'item_appartment_text',
            [
                'label' => esc_html__('Appartment Text', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );


        $repeater->add_control(
            'item_estimated_text',
            [
                'label' => esc_html__('Estimated Text', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );

        $repeater->add_control(
            'item_button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );
        $repeater->add_control(
            'item_button_link',
            [
                'label' => esc_html__('Button Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => 'url',
                    'is_external' => false,
                    'nofollow' => false,
                ],

            ]
        );
        $repeater->add_control(
            'featured_price',
            [
                'label' => __('Featured Price?', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'cleaning_service-core'),
                'label_off' => __('Hide', 'cleaning_service-core'),
                'return_value' => 'yes',
                'default' => 'yes',
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
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Settings', 'cleaning_services-core' ),
			)
		);
		$this->add_control(
			'slides_to_show',
			[
				'label' => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1,
				
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
				'default' => 'yes',
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
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $layout = $settings['layout'];
        $description = $settings['description'];
        if ($layout == '2') {
            $class = 'price-carousel-2 price-carousel-3';
        } else {
            $class = 'price-carousel';
        }
        $column_no = $settings['column'];
        switch ( (int) $column_no ) {
			case 2:
				$colclass = 'col-md-6';
				break;
			case 4:
				$colclass = 'col-md-3';
				break;
			default:
				$colclass = 'col-md-4';
				break;
		}

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
    <div class="block">
        <div class="container">
        <?php  $this->cleaning_service_title();?>
        <div class="text-center max-800">
            <p class="p-lg"><?php echo  $description;?></p>
        </div>
        <div class="<?php echo $class; ?>" id="price-carousel-custom" data-pricetwo='<?php echo wp_json_encode($changed_atts);?>'>
            <?php
            $i = 1;
            foreach ($settings["items"] as $item) {
                
                $item_title_text = $item["item_title_text"];
                $item_price_content = $item["item_price_content"];
                $item_appartment_text = $item["item_appartment_text"];
                $item_estimated_text = $item["item_estimated_text"];
                $featured = $item["featured_price"];
                if ($featured == 'yes') {
                    $featured_clss = 'prices-box prices-box--primary';
                } else {
                    $featured_clss = 'prices-box';
                }

                $item_button_title = $item["item_button_title"];
                $item_button_link = $item[ "item_button_link"]["url"];
                $item_button_link_external = $item[ "item_button_link"]["is_external"] ? 'target="_blank"' : '';
                $item_button_link_nofollow = $item[ "item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
            
                if ($layout == '2') { ?>
                    <div class="<?php echo $colclass;?>">
                        <div class="<?php echo $featured_clss; ?>">
                            <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                            <p></p>
                            <div class="prices-box-price">
                                <?php echo wp_kses_post($item_price_content); ?>
                            </div>
                            <p></p>
                            <div class="prices-box-row"><span><?php echo wp_kses_post($item_appartment_text); ?></span></div>
                            <div class="prices-box-row"><span><?php echo wp_kses_post($item_estimated_text); ?></span></div>
                            <?php
                            if (!empty($item_button_link) && ($item_button_link != '')) :
                            ?>
                                <div class="prices-box-link">
                                    <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?> class="btn"><?php echo $item_button_title; ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="prices-box">
                        <h3 class="prices-box-title"><?php echo wp_kses_post($item_title_text); ?></h3>
                        
                        <div class="prices-box-price">
                            <p></p>
                            <div class="prices-box-price">
                                <?php echo $item_price_content; ?>
                            </div>
                            <p></p>
                        </div>
                        <div class="prices-box-row"><?php echo wp_kses_post($item_appartment_text); ?></div>
                        <div class="prices-box-row"><?php echo wp_kses_post($item_estimated_text); ?></div>
                        <?php
                        if (!empty($item_button_link) && ($item_button_link != '')) :
                        ?>
                            <div class="prices-box-link">
                                <a href="<?php echo esc_url($item_button_link); ?>" <?php echo $item_button_link_external; ?>  <?php echo $item_button_link_nofollow; ?> class="btn btn-sm" data-animation="fadeInUp" data-animation-delay="0.5s">
                                <?php echo $item_button_title; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } 
                $i++; } ?>
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
					<?php echo esc_attr($settings['heading']); ?>
				</<?php echo esc_html($title_tag); ?>>
			<?php
			}
            
		}
	}
}

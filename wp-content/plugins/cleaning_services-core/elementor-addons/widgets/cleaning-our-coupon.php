<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Our_Coupons extends Widget_Base
{

    public function get_name()
    {
        return 'our_coupons';
    }

    public function get_title()
    {
        return esc_html__('Our Coupons', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-graduation-cap';
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
                'label' => esc_html__('general', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
			'layout',
			array(
				'label'   => __( 'Layout Style', 'cleaning_service-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'without_carousel',
				'options' => array(
					'without_carousel' => __( 'without carousel', 'cleaning_service-core' ),
					'with_carousel' => __( 'with carousel', 'cleaning_service-core' ),
				)
			)
		);
        $this->add_control(
			'column',
			[
				'label' => __( 'Column Select', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'2'  => __( '2', 'cleaning_service-core' ),
					'3' => __( '3', 'cleaning_service-core' ),
					'4' => __( '4', 'cleaning_service-core' ),
				]
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
			'title_heading',
			[
				'label'                 => __('Title', 'cleaning_service-core'),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
				'condition'             => [
					'heading_area'    => 'yes',
				],
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
            'button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('See all Coupons', 'cleaning_service-core'),
            ]
        );


        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
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
            'item_coupon_bg_top',
            [
                'label' => esc_html__('Coupon BG Top', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'item_coupon_bg_bottom',
            [
                'label' => esc_html__('Coupon BG Bottom', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'item_logo_image',
            [
                'label' => esc_html__('Logo Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $repeater->add_control(
            'item_coupon_top_right',
            [
                'label' => esc_html__('Coupon Top Right', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'item_coupon_middle',
            [
                'label' => esc_html__('Coupon Middle', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );


        $repeater->add_control(
            'item_coupon_title',
            [
                'label' => esc_html__('Coupon Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );

        $repeater->add_control(
            'item_coupon_ribbon',
            [
                'label' => esc_html__('Coupon Ribbon', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );
        $repeater->add_control(
            'item_coupon_date',
            [
                'label' => esc_html__('Coupon Date', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
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
				'default' => 'yes',
				
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
        $button_title = $settings["button_title"];
        $button_link = $settings["button_link"]["url"];
        $button_link_external = $settings["button_link"]["is_external"] ? 'target="_blank"' : '';
        $button_link_nofollow = $settings["button_link"]["nofollow"] ? 'rel="nofollow"' : '';

        $design_select = $settings['layout'];
        $column_no = $settings['column'];
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12 col-md-6';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
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
            <?php $this->cleaning_service_title();
           if ($design_select == 'without_carousel') { ?>
            <div class="row">
            <?php } else { ?>
                <div class="row coupons-carousel" data-coupon='<?php echo wp_json_encode($changed_atts);?>'>
                <?php
            } 
                $i = 1;
                foreach ($settings["items"] as $item) {
                    $item_coupon_bg_top = ($item["item_coupon_bg_top"]["id"] != "") ? wp_get_attachment_image_url($item["item_coupon_bg_top"]["id"], "full") : $item["item_coupon_bg_top"]["url"];
                    $item_coupon_bg_bottom = ($item["item_coupon_bg_bottom"]["id"] != "") ? wp_get_attachment_image_url($item["item_coupon_bg_bottom"]["id"], "full") : $item["item_coupon_bg_bottom"]["url"];
                    $item_logo_image = ($item["item_logo_image"]["id"] != "") ? wp_get_attachment_image($item["item_logo_image"]["id"], "full") : $item["item_logo_image"]["url"];
                    $item_logo_image_alt = get_post_meta($item["item_logo_image"]["id"], "_wp_attachment_image_alt", true);
                    $item_coupon_top_right = $item["item_coupon_top_right"];
                    $item_coupon_middle = $item["item_coupon_middle"];
                    $item_coupon_title = $item["item_coupon_title"];
                    $item_coupon_ribbon = $item["item_coupon_ribbon"];
                    $item_coupon_date = $item["item_coupon_date"];
                ?>
                    <!--<div class="col-md-6">-->
                    <div class="<?php echo esc_html__($colclass); ?>">
                        <div class="coupon">
                            <div class="coupon-inside">
                                <?php if (isset($item_coupon_bg_top)) { ?>
                                    <img src="<?php echo esc_url($item_coupon_bg_top); ?>" class="coupon-top-bg" alt="">
                                <?php } 
                                 if (isset($item_coupon_bg_bottom)) { ?>
                                    <img src="<?php echo esc_url($item_coupon_bg_bottom); ?>" class="coupon-bot-bg" alt="">
                                <?php } ?>
                                <div class="coupon-logo">
                                    <?php
                                    if (wp_http_validate_url($item_logo_image)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_logo_image); ?>" alt="<?php esc_url($item_logo_image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_logo_image;
                                    }
                                    ?>
                                </div>
                                <div class="coupon-text-1"><?php echo $item_coupon_top_right; ?></div>
                                <div class="clearfix"></div>
                                <div class="coupon-text-2"><?php echo $item_coupon_middle; ?></div>
                                <div class="coupon-text-3"><?php echo $item_coupon_title; ?></div>
                                <div class="coupon-ribbon"><?php echo $item_coupon_ribbon; ?></div>
                                <div class="coupon-text-3"><?php echo $item_coupon_date; ?></div>
                            </div>
                            <div class="coupon-print"><i class="icon-printer"></i></div>
                        </div>
                    </div> <?php $i++;
                        } ?>
                </div>
                <div class="text-center">
                    <?php
                    if ($button_link !== '') {
                    ?>
                        <a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="btn">
                            <?php echo $button_title; ?>
                        </a>
                    <?php
                    }
                    ?>
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

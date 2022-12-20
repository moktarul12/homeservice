<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Banner_Slider extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_banner_slider';
    }

    public function get_title()
    {
        return esc_html__('Banner Slider', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-cog';
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
                'label' => esc_html__('Item', 'cleaning_service-core')
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
					'2' => __( 'Two', 'cleaning_service-core' )
				)
			)
		);
        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'item_slider_image',
            [
                'label' => esc_html__('Slider Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $repeater->add_control(
            'item_first_title',
            [
                'label' => esc_html__('First Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                
            ]
        );
        $repeater->add_control(
            'item_second_title',
            [
                'label' => esc_html__('Second Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            
            ]
        );
        $repeater->add_control(
            'item_third_title',
            [
                'label' => esc_html__('Third Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
                
            ]
        );
        $repeater->add_control(
            'item_content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );
        $repeater->add_control(
            'item_action_button',
            [
                'label' => esc_html__('Action Button', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
                
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
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
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
			array(
				'label' => __( 'Settings', 'cleaning_services-core' )
			)
		);
		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause On Hover?', 'cleaning_service-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes'
				
			]
		);
        $this->add_control(
			'pause_on_dots_hover',
			[
				'label' => __( 'Pause On Dots Hover?', 'cleaning_service-core' ),
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
        $this->add_control(
			'fade',
			[
				'label' => __( 'Enable Fades?', 'cleaning_service-core' ),
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

        $layout = $settings['layout'];
        $sec_class = $settings['extra_class'];
        $autoplay_speed = $settings['autoplay_speed'];
        $extra_class = $sec_class ?? '';

        if($settings['pause_on_hover'] == 'yes'){
            $pause_on_hover = true;
        }else{
            $pause_on_hover = false;
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

        if($settings['pause_on_dots_hover'] == 'yes'){
            $pause_dots_hover = true;
        }else{
            $pause_dots_hover = false;
        }

        if($settings['fade'] == 'yes'){
            $fade = true;
        }else{
            $fade = false;
        }

        $changed_atts = array(
            'autoplay'            => $autoplay,
            'autoplay_speed'      => $autoplay_speed,
            'arrows'              => $arrows,
            'dots'                => $dots,
            'fade'                => $fade,
            'pause_on_hover'      => $pause_on_hover,
            'pause_on_dots_hover' => $pause_dots_hover
        );
?>
    <div class="block">
        <div id="mainSliderWrapper" class="mainslider <?php echo esc_attr($extra_class); ?>" data-slickslider='<?php echo wp_json_encode( $changed_atts ); ?>'>
            <div class="loading-content">
                <div class="loading-dots dark-gray">
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
            <div id="mainSlider">
                <?php
                $i = 1;
                foreach ($settings["items"] as $item) {
                    $item_slider_image = ($item["item_slider_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_slider_image"]["id"], "full") : $item["item_slider_image"]["url"];
                    $item_first_title = $item["item_first_title"];
                    $item_second_title = $item["item_second_title"];
                    $item_second_title = $item["item_second_title"];
                    $item_third_title = $item["item_third_title"];
                    $item_content = $item["item_content"];
                    $item_action_button = $item["item_action_button"];
                    $item_link_url = $item["item_button_link"]["url"];
                    $item_link_url_external = $item["item_button_link"]["is_external"] ? 'target="_blank"' : '';
                    $item_link_url_nofollow = $item["item_button_link"]["nofollow"] ? 'rel="nofollow"' : '';
                    if ($layout == '2') { ?>
                        <div class="slide">
                            <div class="img--holder" style="background-image: url(<?php echo esc_url($item_slider_image); ?>);"></div>
                            <div class="slide-content center">
                                <div class="vert-wrap container">
                                    <div class="vert">
                                        <div class="container">
                                            <?php
                                            if ($item_content != '') {
                                                echo $item_content;
                                            }
                                            ?>
                                            <h4 class="" data-animation="fadeInDown"><?php echo wp_kses_post($item_first_title); ?></h4>
											<h2 data-animation="zoomIn" data-animation-delay="0.5s" class=""><?php echo wp_kses_post($item_second_title); ?></h2>
                                            <h3 data-animation="zoomIn" data-animation-delay="0.5s" class=""><?php echo wp_kses_post($item_third_title); ?></h3>	
                                            <?php if ($item_link_url != '') : ?>
                                                <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="btn" data-animation="fadeInUp" data-animation-delay="0.5s">
                                                    <?php echo $item_action_button; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="slide">
                            <div class="img--holder" style="background-image: url(<?php echo esc_url($item_slider_image); ?>);"></div>
                            <div class="slide-content center">
                                <div class="vert-wrap container">
                                    <div class="vert">
                                        <div class="container">
                                            <h2 data-animation="zoomIn" data-animation-delay="0.5s"><?php echo wp_kses_post($item_first_title); ?></h2>
                                            <h2 data-animation="zoomIn" data-animation-delay="0.5s"><?php echo wp_kses_post($item_second_title); ?></h2>
                                            <?php
                                            if ($item_content != '') {
                                                echo wp_kses_post($item_content);
                                            }
                                            ?>
                                            <?php if ($item_link_url != '') : ?>
                                                <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="btn" data-animation="fadeInUp" data-animation-delay="0.5s">
                                                    <?php echo $item_action_button; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                    $i++;
                } ?>
            </div>
        </div>
    </div>
<?php
    }
}

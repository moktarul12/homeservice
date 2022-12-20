<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Brand_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'brand_carousel';
    }

    public function get_title()
    {
        return esc_html__('Brand Carousel', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-location-arrow';
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT
            ]
        );


        $repeater->add_control(
            'item_link',
            [
                'label' => esc_html__('Link', 'cleaning_service-core'),
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

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'cleaning_service-core'),
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
			'content_section_slider',
			array(
				'label' => __( 'Settings', 'cleaning_services-core' )
			)
		);
		$this->add_control(
			'slides_to_show',
			[
				'label' => __( 'How many Slider to Show?', 'cleaning_service-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3
			]
		);
		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'How many Slides to scroll?', 'cleaning_service-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 1
				
			]
		);
		$this->add_control(
			'infinite',
			[
				'label' => __( 'Is infinite?', 'cleaning_service-core' ),
				'type' => Controls_Manager::SWITCHER,
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
				'type' => Controls_Manager::SWITCHER,
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
				'type' => Controls_Manager::SWITCHER,
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
				'type' => Controls_Manager::SWITCHER,
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
        <!-- Brands Carousel -->
        <div class="block">
            <div class="container">
                <h2 class="text-center h-lg h-decor"><?php echo $heading; ?></h2>
                <div class="brand-carousel" data-brand='<?php echo wp_json_encode($changed_atts);?>'>
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_title = $item["item_title"];
                        $item_link = $item["item_link"]["url"];
                        $item_link_external = $item["item_link"]["is_external"] ? 'target="_blank"' : '';
                        $item_link_nofollow = $item["item_link"]["nofollow"] ? 'rel="nofollow"' : '';
                        $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                    ?> 
                        <a href="<?php echo esc_url($item_link); ?>" <?php echo $item_link_external; ?> <?php echo $item_link_nofollow; ?>>
                            <?php
                            if (wp_http_validate_url($item_image)) {
                            ?>
                                <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                            <?php
                            } else {
                                echo $item_image;
                            }
                            ?>
                        </a> 
                    <?php $i++; } ?>
                </div>
            </div>
        </div>
        <!-- /Brands Carousel -->
<?php
    }
}

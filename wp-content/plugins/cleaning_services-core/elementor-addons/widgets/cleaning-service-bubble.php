<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Service_Bubble extends Widget_Base
{

    public function get_name()
    {
        return 'service_bubble';
    }

    public function get_title()
    {
        return esc_html__('Service Bubble', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-folder-open';
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
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                
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
                'default' => __('Our Service', 'cleaning_service-core'),
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
        $repeater = new Repeater();
        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                
            ]
        );
        $repeater->add_control(
            'item_link_url',
            [
                'label' => esc_html__('Link URL', 'cleaning_service-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'cleaning_service-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],

            ]
        );

        $repeater->add_control(
            'item_positioin',
            [
                'label' => esc_html__('Position', 'cleaning_service-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'one'  => esc_html__('One', 'cleaning_service-core'),
                    'two'  => esc_html__('Two', 'cleaning_service-core'),
                    'three'  => esc_html__('Three', 'cleaning_service-core'),
                    'four'  => esc_html__('Four', 'cleaning_service-core'),
                    'five'  => esc_html__('Five', 'cleaning_service-core'),
                    'six'  => esc_html__('Six', 'cleaning_service-core'),

                ],
                'default' => 'one',


            ]
        );

        $repeater->add_control(
            'item_images',
            [
                'label' => esc_html__('Images', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

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
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();

        $extra_class = $settings['extra_class'];
        $sec_class = $extra_class ?? '';

        $changed_atts = 
			array(
				'mobile_first'     => 'true',
				'slides_to_show'   => '1',
				'slides_to_scroll' => '1',
				'infinite'         => 'true',
				'autoplay'         => 'true',
				'autoplay_speed'   => '2000',
				'arrows'           => 'true',
				'dots'             => 'false',
		);

		wp_localize_script( 'cleaning-services-custom', 'ajax_bannershine', $changed_atts );
    ?> 
<div class="block bottom-null">
    <div class="container">
        <?php $this->cleaning_service_title();?>
        <div class="services-circle">
            <div class="services-circle-carousel <?php echo $sec_class;?>">
                <?php
                $i = 1;
                foreach ($settings["items"] as $item) {
                    $position = $item["item_positioin"];
                    $item_title = $item["item_title"];
                    $item_link_url = $item["item_link_url"]["url"];
                    $item_link_url_external = $item["item_link_url"]["is_external"] ? 'target="_blank"' : '';
                    $item_link_url_nofollow = $item["item_link_url"]["nofollow"] ? 'rel="nofollow"' : '';
                    $item_images = ($item["item_images"]["id"] != "") ? wp_get_attachment_image($item["item_images"]["id"], "full") : $item["item_images"]["url"];
                    $item_images_alt = get_post_meta($item["item_images"]["id"], "_wp_attachment_image_alt", true);
                    if ($position === 'one') {
                ?>
                        <div class="services-circle-item pos-1">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                            </a>
                            <div class="services-circle-item-title"><?php echo $item_title; ?></div>
                        </div>

                    <?php } elseif ($position === 'two') { ?>
                        <div class="services-circle-item pos-2">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                            </a>
                            <div class="services-circle-item-title"><?php echo $item_title; ?></div>
                        </div>
                    <?php } elseif ($position === 'three') { ?>
                        <div class="services-circle-item pos-3">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                            </a>
                            <div class="services-circle-item-title">
                                <?php echo $item_title; ?>
                            </div>
                        </div>
                    <?php } elseif ($position === 'four') { ?>
                        <div class="services-circle-item pos-4">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                            </a>
                            <div class="services-circle-item-title">
                                <?php echo $item_title; ?>
                            </div>
                        </div>
                    <?php } elseif ($position === 'five') { ?>
                        <div class="services-circle-item pos-5">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                                </a>
                                <div class="services-circle-item-title">
                                    <?php echo $item_title; ?>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="services-circle-item pos-6">
                            <a href="<?php echo esc_url($item_link_url); ?>" <?php echo $item_link_url_external; ?> <?php echo $item_link_url_nofollow; ?> class="services-circle-item-img">">
                                <?php
                                if (wp_http_validate_url($item_images)) {
                                ?>
                                    <img src="<?php echo esc_url($item_images); ?>" alt="<?php esc_url($item_images_alt); ?>">
                                <?php
                                } else {
                                    echo $item_images;
                                }
                                ?>
                                </a>
                                <div class="services-circle-item-title">
                                    <?php echo $item_title; ?>
                            </div>
                        </div>
                <?php
                    }
                    $i++;
                } ?>
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
					<?php echo esc_attr($settings['heading']); ?>
				</<?php echo esc_html($title_tag); ?>>
			<?php
			}
           
		}
	}
}

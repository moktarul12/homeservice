<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleanign_Satisfaction_Guaranteed extends Widget_Base
{

    public function get_name()
    {
        return 'satisfaction_guaranteed';
    }

    public function get_title()
    {
        return esc_html__('Guaranteed Banner', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-circle-o';
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
				]
			]
		);
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Satisfaction Guaranteed!', 'cleaning_service-core'),
                'condition'             => [
					'heading_area'    => 'yes',
				]
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

            ]
        );


        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Get a Free Estimate', 'cleaning_service-core'),
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
                    'url' => 'url',
                    'is_external' => false,
                    'nofollow' => false,
                ],

            ]
        );

        $this->add_control(
            'shal_image',
            [
                'label' => esc_html__('Shal Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $description = $settings["description"];
        $button_title = $settings["button_title"];
        $button_link = $settings["button_link"]["url"];
        $button_link_external = $settings["button_link"]["is_external"] ? 'target="_blank"' : '';
        $button_link_nofollow = $settings["button_link"]["nofollow"] ? 'rel="nofollow"' : '';
        $shal_image = ($settings["shal_image"]["id"] != "") ? wp_get_attachment_image($settings["shal_image"]["id"], "full") : $settings["shal_image"]["url"];
        $shal_image_alt = get_post_meta($settings["shal_image"]["id"], "_wp_attachment_image_alt", true);
        $image = ($settings["image"]["id"] != "") ? wp_get_attachment_image_url($settings["image"]["id"], "full") : $settings["image"]["url"];
?>
    <div class="block">
        <div class="container">
            <div class="row row-flex flex-column-sm align-center">
                <div class="col-sm-6">
                    <?php $this->cleaning_service_title();
                    echo $description; ?>
                    <div class="divider"></div>
                    <?php if(!empty($button_link)) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="btn animation animated tada" data-animation="tada"><?php echo $button_title; ?></a>
                <?php endif;?>
                </div>
                <div class="col-sm-6">
                    <div class="img-with-shtamp">
                        <div class="shtamp">
                            <?php
                            if (wp_http_validate_url($shal_image)) {
                            ?>
                                <img src="<?php echo esc_url($shal_image); ?>" alt="<?php esc_url($shal_image_alt); ?>">
                            <?php
                            } else {
                                echo $shal_image;
                            }
                            ?>
                        </div>
                        <img src="<?php echo $image; ?>" class="img-responsive" alt="" loading="lazy">
                    </div>
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
			$this->add_render_attribute('heading', 'class', 'heading');
			

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

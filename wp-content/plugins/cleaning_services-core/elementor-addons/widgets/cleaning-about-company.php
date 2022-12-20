<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;

class Cleaning_About_Company extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_about_company';
    }

    public function get_title()
    {
        return esc_html__('About Company', 'cleaning-service');
    }

    public function get_icon()
    {
        return 'fa fa-bug';
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
                'label' => esc_html__('General', 'cleaning-service'),
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
                'default' => __('Our Team', 'cleaning_service-core'),
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
				],
                'condition'             => [
					'heading_area'    => 'yes',
				]
			]
		);
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning-service'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning-service'),
                'condition'             => [
					'heading_area'    => 'yes',
				],

            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'cleaning-service'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $this->add_control(
            'title_text',
            [
                'label' => esc_html__('Title Text', 'cleaning-service'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('More than 10 years of cleaning experience', 'cleaning-service'),
            ]
        );
        $this->add_control(
            'description_1',
            [
                'label' => esc_html__('Description', 'cleaning-service'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning-service'),

            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
       
        $heading_area = $settings["heading_area"];
        $description = $settings["description"];
        $image = ($settings["image"]["id"] != "") ? wp_get_attachment_image_url($settings["image"]["id"], "full") : $settings["image"]["url"];
        $title_text = $settings["title_text"];
        $description_1 = $settings["description_1"];

?>
        <div class="block fullwidth no-pad cleaning-about-company">
            <div class="container">
                <?php if($heading_area == 'yes') {
                 $this->cleaning_service_title();?>
                 <?php if(!empty($description)){ ?>
                <div class="text-center max-700">
                    <p class="p-lg"><?php echo $description; ?> </p>
                </div>
                <?php } } ?>
                <div class="divider"></div>
                <div class="row-flex-text">
                    <div class="col-50 bg-cover hide-bg-sm" data-bg="<?php echo $image; ?>" style="background-image: url(<?php echo $image; ?>);">
                        <div class="visible-sm visible-xs"><img src="<?php echo $image; ?>" class="img-fullwidth" loading="lazy" alt="About Us"></div>
                    </div>
                    <div class="col-50 bg-text">
                        <div class="bg-text-inside">
                            <h4><?php echo $title_text; ?></h4>
                            <?php echo $description_1; ?>
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
			$this->add_render_attribute('heading', 'class', 'text-center h-decor');

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

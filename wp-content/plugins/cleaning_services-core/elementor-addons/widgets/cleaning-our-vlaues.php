<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Our_Values extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_our_values';
    }

    public function get_title()
    {
        return esc_html__('Our Values', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-globe';
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
				'default' => '1',
				'options' => array(
					'1' => __( 'One', 'cleaning_service-core' ),
					'2' => __( 'Two', 'cleaning_service-core' ),
				),
			)
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
				],
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
					'heading_area'    => 'yes',
				],
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
            'left_image',
            [
                'label' => esc_html__('Left Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
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
                'default' => __('Client oriented', 'cleaning_service-core'),
            ]
        );


        $repeater->add_control(
            'item_content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

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
        
        $layout = $settings["layout"];
        $heading_area = $settings["heading_area"];
        $description = $settings["description"];
        $left_image = ($settings["left_image"]["id"] != "") ? wp_get_attachment_image($settings["left_image"]["id"], "full") : $settings["left_image"]["url"];
        $left_image_alt = get_post_meta($settings["left_image"]["id"], "_wp_attachment_image_alt", true);
?> 
    <?php if($layout == '1') { ?>
        <div class="block">
            <div class="container">
                <?php if($heading_area == 'yes') : 
                $this->cleaning_service_title();?>
                <div class="text-center max-700">
                    <p class="p-lg"><?php echo $description; ?></p>
                </div>
                <?php endif;?>
                <div class="divider"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <?php
                            if (wp_http_validate_url($left_image)) {
                            ?>
                                <img src="<?php echo esc_url($left_image); ?>" alt="<?php esc_url($left_image_alt); ?>">
                            <?php
                            } else {
                                echo $left_image;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="divider-lg visible-sm visible-xs"></div>
                    <div class="col-md-6">
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_title_text = $item["item_title_text"];
                            $item_content = $item["item_content"];
                        ?> 
                            <div class="marker-box">
                                <div class="marker-box-marker"></div>
                                <h4 class="marker-box-title"><?php echo $item_title_text; ?></h4>
                                <p><?php echo $item_content; ?></p>
                            </div> 
                            <?php $i++;} ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } else if($layout == '2') { ?>
        <div class="block">
			<div class="container">
                <?php $this->cleaning_service_title();?>
				<p class="text-center"><?php echo $description; ?></p>
				<div class="divider-sm"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="text-center">
                        <?php
                            if (wp_http_validate_url($left_image)) {
                            ?>
                                <img src="<?php echo esc_url($left_image); ?>" alt="<?php esc_url($left_image_alt); ?>">
                            <?php
                            } else {
                                echo $left_image;
                            }
                            ?>
						</div>
					</div>
					<div class="divider-md visible-sm visible-xs"></div>
					<div class="col-md-6">
						<ul class="marker-list">
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_title_text = $item["item_title_text"];
                            $item_content = $item["item_content"];
                        ?> 
							<li><?php echo $item_content; ?></li>
                        <?php $i++;
                                } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
<?php
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

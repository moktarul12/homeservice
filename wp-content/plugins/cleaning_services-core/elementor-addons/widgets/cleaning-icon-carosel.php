<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Icon_Carousel_Box extends Widget_Base
{

    public function get_name()
    {
        return 'icon_carousel_box';
    }

    public function get_title()
    {
        return esc_html__('Icon carousel box', 'cleaning-service');
    }

    public function get_icon()
    {
        return 'fa fa-medium';
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
                'label' => esc_html__('General', 'cleaning-service')
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
					'2' => __( 'Two', 'cleaning_service-core' )
				)
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
					'4' => __( '4', 'cleaning_service-core' )
				]
			]
		);

        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning-service'),
                'type' => Controls_Manager::TEXT
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning-service'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Why Hire Us?', 'cleaning-service'),
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
					'heading_area'    => 'yes'
				]
			]
		);

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning-service'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning-service')

            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning-service')
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_heading',
            [
                'label' => esc_html__('Heading', 'cleaning-service'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Our Bonded & Insured<br>Cleaning Team', 'cleaning-service')
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'cleaning-service'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning-service')

            ]
        );

        $repeater->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'cleaning-service'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'cleaning-service'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'cleaning-service'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning-service')
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'cleaning-service'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning-service')
                    ]
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $extra_class = $settings["extra_class"];
        $layout = $settings["layout"];
        $heading_area = $settings["heading_area"];
       
        $description = $settings["description"];
        $extra_class = $settings["extra_class"];

        $column_no = $settings['column'];
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-md-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-6 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-6 col-xs-12';
                break;
        }

        if($layout == '2'){
            $class = 'row text-icon-row style-2';
        }else{
            $class = 'row';
        }

        $sec_class = $class. ' ' .$extra_class;
?>
        <div class="block">
            <div class="container">
                <?php if($heading_area == 'yes') : 
                $this->cleaning_service_title();?>
                <?php 
                if($layout == '2'){ ?>
                <div class="text-center max-800">
                    <p class="p-lg"><?php echo $description; ?></p>
                </div>
                <?php } else { ?>
                    <p class="text-center"><?php echo $description; ?></p>
                <?php } endif;?>
                <div class="<?php echo $sec_class;?>">
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_heading = $item["item_heading"];
                        $item_description = $item["item_description"];
                        $item_icon = $item["item_icon"];
                    ?>  
                        <div class="<?php echo $colclass; ?> text-icon">
                            <div class="text-icon-icon">
                                <?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true','class' => 'icon')); ?>
                            </div>
                            <?php if ($layout == '2') { ?><h4 class="text-icon-title"><?php echo $item_heading; ?></h4><?php } else { ?><h5 class="text-icon-title"><?php echo $item_heading; ?></h5><?php } ?><div class="text-icon-text"><?php echo $item_description;?></div>
                        </div> 
                        <?php $i++;
                            } ?>
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

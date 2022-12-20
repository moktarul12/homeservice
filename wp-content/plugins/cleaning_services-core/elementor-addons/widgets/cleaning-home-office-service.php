<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Home_And_Office_Service extends Widget_Base
{

    public function get_name()
    {
        return 'home_office_service';
    }

    public function get_title()
    {
        return esc_html__('Home &amp; Office Service', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-stack-overflow';
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Cleaning With a Conscience', 'cleaning_service-core')
            ]
        );


        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Professional Cleaning Services for Home and Office', 'cleaning_service-core')
            ]
        );


        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'cleaning_service-core')
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_list_content',
            [
                'label' => esc_html__('List Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

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
			[
				'label' => esc_html__('Background', 'sds-elementor-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'cleaning_service-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .fullwidth-bg'
			]
		);

		$this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $sub_heading = $settings["sub_heading"];
        $content = $settings["content"];
?>
        <div class="block fullwidth-bg inset-70 bg-bottom bottom-null hide-bg-md">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3">
                        <h2 class="text-center h-lg h-decor"><?php echo $heading; ?></h2>
                        <h3 class="text-center"><?php echo $sub_heading; ?></h3>
                        <p class="text-center"><?php echo $content; ?> </p>
                        <div class="row">
                            <?php
                            $i = 1;
                            foreach ($settings["items"] as $item) {
                                $item_list_content = $item["item_list_content"];
                            ?> 
                                <div class="col-sm-6 col-lg-5 col-lg-push-1">
                                    <ul class="marker-list">
                                        <?php echo $item_list_content; ?>
                                    </ul>
                                </div>
                            <?php $i++;
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php
            }
        }

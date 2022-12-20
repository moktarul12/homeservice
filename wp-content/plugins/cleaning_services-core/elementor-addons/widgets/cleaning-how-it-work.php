<?php
namespace CleaningServiceAddons\Widgets;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
class How_It_Works extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_how_it_works';
    }

    public function get_title()
    {
        return esc_html__('How it Works', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-dot-circle-o';
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
                'label' => esc_html__('General', 'cleaning_service-core')
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('How Cleaning Company Works', 'cleaning_service-core')
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core')

            ]
        );

        $this->add_control(
            'item_content_two',
            [
                'label' => esc_html__('Description 2', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Book & pay online. We match you with a trusted, experienced house cleaner', 'cleaning_service-core'),
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
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );


        $repeater->add_control(
            'item_highlight_text',
            [
                'label' => esc_html__('Highlight Text', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('60 seconds', 'cleaning_service-core')
            ]
        );


        $repeater->add_control(
            'item_content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Book & pay online. We match you with a trusted, experienced house cleaner', 'cleaning_service-core'),
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
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $heading = $settings["heading"];
        $description = $settings["description"];
        $item_content_two = $settings["item_content_two"];
       
?>
        <div class="row">
            <div class="col-lg-6">
                <h4><?php echo $heading; ?></h4>
                <p><?php echo $description; ?></p>
                <p class="visible-lg"><?php echo  $item_content_two;?></p><p></p>
            </div>
            <div class="col-lg-6">
                <?php
                $i = 1;
                foreach ($settings["items"] as $item) {
                    $item_title = $item["item_title"];
                    $item_highlight_text = $item["item_highlight_text"];
                    $item_content = $item["item_content"];
                ?> 
                <h6><?php echo $item_title; ?><span class="color"> <?php echo $item_highlight_text; ?></span></h6>
                <p><?php echo $item_content; ?></p> 
                    <?php $i++;} ?>
            </div>
        </div> 
    <?php
        }
    }

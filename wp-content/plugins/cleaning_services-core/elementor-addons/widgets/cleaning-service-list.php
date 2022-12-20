<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Service_List extends Widget_Base
{

    public function get_name()
    {
        return 'service_list_cleaning';
    }

    public function get_title()
    {
        return esc_html__('Service List', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-dashboard';
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
                'label' => esc_html__('item', 'cleaning_service-core'),
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
?>
        <ul class="marker-list sub-services-list">
            <?php
            $i = 1;
            foreach ($settings["items"] as $item) {
                $item_title = $item["item_title"];
                $item_content = $item["item_content"];
            ?>
                <li><b><?php echo $item_title; ?></b><?php echo $item_content; ?></li>
            <?php $i++;
            } ?>
        </ul>
        <div class="divider-xl"></div>
<?php
    }
}

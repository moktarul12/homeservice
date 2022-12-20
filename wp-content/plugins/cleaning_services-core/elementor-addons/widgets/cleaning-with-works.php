<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class With_Us extends Widget_Base
{

    public function get_name()
    {
        return 'with_us';
    }

    public function get_title()
    {
        return esc_html__('About With Us', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-file-audio-o';
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
        $this->add_control(
            'per_column',
            array(
                'label'   => esc_html__('Per Column', 'orexon-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,

            )
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'item_count_no',
            [
                'label' => esc_html__('Count No', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('1', 'cleaning_service-core'),
            ]
        );


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('We Treat Your Homes Like Ours', 'cleaning_service-core'),
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
        $per_column = $settings['per_column'];
?>
        <div class="row">
            <?php
            $i = 1;
            $count = 1;
            $flag  = 0;
            foreach ($settings["items"] as $item) {
                $item_count_no = $item["item_count_no"];
                $item_title = $item["item_title"];
                $item_content = $item["item_content"];

                if ($count == 1) {
            ?>
                    <div class="col-lg-6">
                    <?php } ?>
                    <div class="num-box">
                        <div class="num-box-num"><?php echo $item_count_no; ?></div>
                        <h4 class="num-box-title"><?php echo $item_title; ?></h4>
                        <p><?php echo $item_content; ?></p>
                    </div>
                    <?php
                    if ($count == $per_column) {
                    ?>
                    </div>
                <?php
                        $count = 1;
                        $flag  = 0;
                    } else {
                        $count++;
                        $flag = 1;
                    }
                }
                if ($flag) {
                ?>
        </div>
    <?php } ?>
    </div>
<?php
    }
}

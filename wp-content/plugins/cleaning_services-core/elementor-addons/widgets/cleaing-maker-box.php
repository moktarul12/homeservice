<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Maker_Box extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_maker_box';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Maker Box', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-briefcase';
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
            'left_image',
            [
                'label' => esc_html__('Left Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src()
                ]
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Natural Cleaning Products', 'cleaning_service-core')
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cleaning_service-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('We feel good about cleaning with our self-formulated, natural products that are better for the environment', 'cleaning_service-core'),
                'placeholder' => esc_html__('Type your description here', 'cleaning_service-core'),

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
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Title', 'cleaning_service-core'),
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
                    ],
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $left_image = ($settings["left_image"]["id"] != "") ? wp_get_attachment_image($settings["left_image"]["id"], "full") : $settings["left_image"]["url"];
        $left_image_alt = get_post_meta($settings["left_image"]["id"], "_wp_attachment_image_alt", true);
        $heading = $settings["heading"];
        $description = $settings["description"];
?>
        <div class="block m-bottom-45">
            <div class="container">
                <div class="row row-revert-xs">
                    <div class="col-sm-6">
                        <div class="img-left-wrap1">
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
                    <div class="col-sm-6">
                        <h2><?php echo $heading; ?></h2>
                        <p class="p-lg"><?php echo $description; ?></p>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_title = $item["item_title"];
                          
                            $item_content = $item["item_content"];
                        ?> 
                            <div class="marker-box">
                                <div class="marker-box-marker"></div>
                                <h4 class="marker-box-title"><?php echo $item_title; ?></h4>
                                <p><?php echo $item_content; ?></p>
                            </div> 
                            <?php $i++;
                                } ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

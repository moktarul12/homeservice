<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Customer_Choose_Us extends Widget_Base
{

    public function get_name()
    {
        return 'customer_choose_us';
    }

    public function get_title()
    {
        return esc_html__('Customer Choose Us', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-users';
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
            'large_image',
            [
                'label' => esc_html__('Large Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->add_control(
            'small_image',
            [
                'label' => esc_html__('Small Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

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
            'title_heading',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::HEADING,
                'separator'             => 'before',
                'condition'             => [
                    'heading_area'    => 'yes',
                ]
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXT,
                'default'               => __('About Our Company', 'cleaning_service-core'),
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
                    'heading!'    => '',
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
                'condition'             => [
                    'heading_area'    => 'yes',
                ]

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
                'default' => __('Top-Rated Company', 'cleaning_service-core'),
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
        $large_image = ($settings["large_image"]["id"] != "") ? wp_get_attachment_image_url($settings["large_image"]["id"], "full") : $settings["large_image"]["url"];
        $small_image = ($settings["small_image"]["id"] != "") ? wp_get_attachment_image_url($settings["small_image"]["id"], "full") : $settings["small_image"]["url"];
        $description = $settings["description"];
?>      <div class="block">
            <div class="container">
                <div class="row row-revert-xs">
                    <div class="col-sm-5 col-md-5 col-lg-6">
                        <img src="<?php echo  $large_image;?>" class="img-responsive visible-lg visible-md hidden-sm visible-xs" alt="" loading="lazy">
                        <img src="<?php echo $small_image;?>" class="img-responsive hidden-lg hidden-md hidden-xs visible-sm" alt="" loading="lazy">
                    </div>
                    <div class="divider-xl visible-xs"></div>
                    <div class="col-sm-7 col-md-7 col-lg-6">
                        <?php  $this->cleaning_heading();?>
                        <p class="p-lg"><?php echo $description; ?>
                        </p>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_title = $item["item_title"];
                            $item_content = $item["item_content"];
                            $extra_class = '';
                            if($i == 3 ){
                                $extra_class = 'hidden-md';
                            }
                        ?> 
                            <div class="marker-box <?php echo $extra_class;?>">
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
     /**
     * Render about title output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    private function cleaning_heading()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['heading']) {
           
            $this->add_inline_editing_attributes('heading', 'none');
            $this->add_render_attribute('heading', 'class', 'heading_test');


            if ($settings['heading']) {
                $title_tag = $settings['title_html_tag'];
        ?>
                <<?php echo wp_kses_post($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('heading')); ?>>
                    <?php echo $settings['heading']; ?>
                </<?php echo wp_kses_post($title_tag); ?>>
<?php
            }
           
        }
    }
}

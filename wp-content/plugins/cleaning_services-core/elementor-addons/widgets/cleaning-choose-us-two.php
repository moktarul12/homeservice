<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Choose_Us_Two extends Widget_Base
{

    public function get_name()
    {
        return 'choose_us_cleaning';
    }

    public function get_title()
    {
        return esc_html__('Choose Us 2', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-map-signs';
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
            'heading',
            [
                'label' => esc_html__('Heading', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('History of Cleaning Company', 'cleaning_service-core'),
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
                ],
            ]
        );
        $this->add_control(
            'feature_image',
            [
                'label' => esc_html__('Feature Image', 'cleaning_service-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]

            ]
        );
        $this->add_control(
            'per_column',
            [
                'label' => esc_html__('Per Column', 'cleaning_service-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => __('2', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'order_change',
            [
                'label' => esc_html__('Order Change', 'cleaning_service-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => __('3', 'cleaning_service-core'),
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Items', 'cleaning_service-core'),
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
            'text_align',
            [
                'label' => __('Alignment', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'cleaning_service-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'cleaning_service-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
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
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Background', 'sds-elementor-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'cleaning_service-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .bg-cover',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();

        $per_column = $settings["per_column"];
        $order_change = $settings["order_change"];
        $feature_image = ($settings["feature_image"]["id"] != "") ? wp_get_attachment_image_url($settings["feature_image"]["id"], "full") : $settings["feature_image"]["url"];
?>
        <div class="block fullwidth-bg block-bg-light-grey inset-85 bg-cover bg-mobile-right">
            <div class="container">
                <?php $this->cleaning_service_title(); ?>
                <div class="divider-lg"></div>
                <div class="row feature-wrapper feature-wrapper-flex">
                    <?php
                    $i = 1;
                    $count = 1;
                    $flag  = 0;
                    foreach ($settings["items"] as $item) {
                        $item_title = $item["item_title"];
                        $item_content = $item["item_content"];
                        $text_align = $item["text_align"];
                        if ($text_align == 'right') {
                            $css = 'text-right';
                        } else {
                            $css = '';
                        }
                        $css_counter = "";
                        if ($i == $order_change) {
                            $css_counter = 'order-change';
                        }

                    if ($count == 1) {
                        ?>
                            <div class="col-sm-4 <?php echo $css_counter; ?>">
                            <?php } ?>
                            <div class="feature-text <?php echo $css; ?>">
                                <h5><?php echo $item_title; ?></h5>
                                <p class="font-sm"><?php echo $item_content; ?></p>
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

                            $i++;
                        }
                        if ($flag) {
                        ?>
                </div>
            <?php } ?>
            <div class="col-sm-4 feature-image">
                <img src="<?php echo $feature_image; ?>" class="img-responsive" alt="" loading="lazy" />
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
            $this->add_render_attribute('heading', 'class', 'text-center h-lg');


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

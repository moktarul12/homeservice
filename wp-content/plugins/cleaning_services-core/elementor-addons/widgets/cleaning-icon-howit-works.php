<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Icon_How_It_Works extends Widget_Base
{

    public function get_name()
    {
        return 'icon_how_it_works';
    }

    public function get_title()
    {
        return esc_html__('Icon How It Works', 'cleaning_service-core');
    }

    public function get_icon()
    {
        return 'fa fa-lemon-o';
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
            'column_select',
            [
                'label' => __('Column Select', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2'  => __('2 column', 'cleaning_service-core'),
                    '3' => __('3 Column', 'cleaning_service-core'),
                    '4' => __('4 Column', 'cleaning_service-core'),
                ]
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
            'title_heading',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::HEADING,
                'separator'             => 'before',
                'condition'             => [
                    'heading_area'    => 'yes'
                ]
            ]
        );

        $this->add_control(
            'about_title',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXT,
                'default'               => __('About Our Company', 'cleaning_service-core'),
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
                    'about_title!'    => '',
                    'heading_area'    => 'yes'
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
                    'heading_area'    => 'yes'
                ],

            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'item_number',
            [
                'label' => esc_html__('Number', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
               
            ]
        );


        $repeater->add_control(
            'item_sub_title',
            [
                'label' => esc_html__('Sub Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT
                
            ]
        );


        $repeater->add_control(
            'item_content',
            [
                'label' => esc_html__('Content', 'cleaning_service-core'),
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
        $heading_area = $settings['heading_area'];
        $description = $settings["description"];

        $column_select = $settings['column_select'];

        $column_no = $column_select;

        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-md-6';
                break;
            case 4:
                $colclass = 'col-sm-6 col-md-3';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }
?>
<div class="block">
    <div class="container">
        <?php 
        if($heading_area == 'yes'){ 
        $this->cleaning_about_title();?>
        <p class="text-center"><?php echo $description;?></p>
        <?php } ?>
        <div class="row">
            <?php
            $i = 1;
            foreach ($settings["items"] as $item) {
                $item_title = $item["item_title"];
                $ex = $item["extra_class"];
                $extra_class = $ex ?? '';
                $item_number = $item["item_number"];
                $item_sub_title = $item["item_sub_title"];
                $item_content = $item["item_content"];
            ?>
                <div class="<?php echo $colclass; ?>">
                    <div class="how-works">
                        <div class="how-works-number how-works-number--<?php echo esc_attr($extra_class); ?>"><?php echo $item_number; ?></div>
                        <h3 class="how-works-title"><?php echo $item_title; ?><span> <?php echo $item_sub_title; ?></span></h3>
                        <p>
                            <?php echo $item_content; ?>
                        </p>
                    </div>
                </div>
            <?php $i++;
            } ?>
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
    private function cleaning_about_title()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['about_title']) {
           
            $this->add_inline_editing_attributes('about_title', 'none');
            $this->add_render_attribute('about_title', 'class', 'text-center h-lg h-decor');


            if ($settings['about_title']) {
                $title_tag = $settings['title_html_tag'];
        ?>
                <<?php echo esc_html($title_tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string('about_title')); ?>>
                    <?php echo esc_attr($settings['about_title']); ?>
                </<?php echo esc_html($title_tag); ?>>
<?php
            }
           
        }
    }
}

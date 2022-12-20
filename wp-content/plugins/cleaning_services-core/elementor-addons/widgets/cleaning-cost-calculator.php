<?php
namespace CleaningServiceAddons\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Cleaning_Cost_Calculator extends Widget_Base
{

    public function get_name()
    {
        return 'cleaning_cost_calculator';
    }

    public function get_title()
    {
        return esc_html__('Cost Calculator', 'cleaning_service-core');
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
                'label' => esc_html__('Calculator Form', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXT,
                'default'               => __('About Our Company', 'cleaning_service-core'),
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
            ]
        );
        $this->add_control(
            'sub_heading',
            [
                'label'                 => __('Sub Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXTAREA,
                'default'               => __('About Our Company', 'cleaning_service-core'),
            ]
        );

        $this->add_control(
            'field_per_column',
            array(
                'label'   => esc_html__('Field Per Column', 'orexon-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,

            )
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'heading1_title',
            [
                'label' => esc_html__('Label Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'input_type',
            [
                'label' => __('Input Type', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '3'  => __('Text', 'cleaning_service-core'),
                    '4' => __('Checkbox', 'cleaning_service-core'),
                    '2' => __('Select', 'cleaning_service-core'),
                    '' => __('default', 'cleaning_service-core'),
                ],
            ]
        );
        $repeater->add_control(
            'input_id',
            [
                'label' => esc_html__('ID', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'input_type!' => ''
                ],
            ]
        );
        $repeater->add_control(
            'min_slider_val',
            [
                'label' => esc_html__('Min Slider Value', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'condition' => ['input_type' => '3'],
            ]
        );
        $repeater->add_control(
            'max_slider_val',
            [
                'label' => esc_html__('Max Slider Value', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'condition' => ['input_type' => '3'],
            ]
        );
        $repeater->add_control(
            'step_slider_val',
            [
                'label' => esc_html__('Step Slider Value', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'condition' => ['input_type' => '3'],
            ]
        );
        $repeater->add_control(
            'slider_price_field',
            [
                'label' => esc_html__('Slider Price', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'start_slider_val',
            [
                'label' => esc_html__('Start Slider Value', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'condition' => ['input_type' => '3'],
            ]
        );
        $repeater->add_control(
            'slider_text_field',
            [
                'label' => __('Slider Text Field Enable?', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => ['input_type' => '3'],
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
                        'heading1_title' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'heading1_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'additional_service',
            [
                'label' => esc_html__('Calculator Form ID & Value', 'cleaning_service-core'),
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'form_id',
            [
                'label' => esc_html__('Form ID', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'form_name',
            [
                'label' => esc_html__('Name', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'form_value',
            [
                'label' => esc_html__('Value', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'form_item',
            [
                'label' => esc_html__('Form Item', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'form_name' => esc_html__('Item #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'form_name' => esc_html__('Item #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'add_mid_control',
            [
                'label' => esc_html__('Additional Select Form', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'add_additional_title',
            [
                'label'                 => __('Title', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXT,
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'add_heading1_title',
            [
                'label' => esc_html__('Label Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'add_input_id',
            [
                'label' => esc_html__('Form ID', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'add_slider_price_field',
            [
                'label' => esc_html__('Slider Price', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'items_additional',
            [
                'label' => esc_html__('Repeater List', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'add_heading1_title' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'add_heading1_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'checkbox_control',
            [
                'label' => esc_html__('Checkbox Button', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'checkbox_title',
            [
                'label' => esc_html__('Label Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'chk_list_item_heading_title',
            [
                'label' => esc_html__('Heading Title', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'checkbox_btn_price',
            [
                'label' => esc_html__('Price', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'checkbox_button',
            [
                'label' => esc_html__('Repeater List', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'chk_list_item_heading_title' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'chk_list_item_heading_title' => esc_html__('Title #2', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'contact_form_field',
            [
                'label' => esc_html__('Contact Form Field', 'cleaning_service-core'),
            ]
        );
        $this->add_control(
            'cart_enable',
            [
                'label' => __('Cart Enable', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'form_top_heading',
            [
                'label'                 => __('Form Top Heading', 'cleaning_service-core'),
                'type'                  => Controls_Manager::TEXTAREA,
                'default'               => __('Enter your contact details. We will give you a call to finish up.', 'cleaning_service-core'),
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'form_text',
            [
                'label' => esc_html__('Form Text', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'form_input_type',
            [
                'label' => __('Form Input Type', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    '1'  => __('Text', 'cleaning_service-core'),
                    '2' => __('Message', 'cleaning_service-core'),
                    '3' => __('Terms & Condition', 'cleaning_service-core'),
                    '4' => __('E-Mail', 'cleaning_service-core'),
                ]
            ]
        );
        $repeater->add_control(
            'terms_switch_field',
            [
                'label' => __('Switch Field Enable?', 'cleaning_service-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'terms_switch_link',
            [
                'label' => esc_html__('Terms Switch Link', 'cleaning_service-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'contact_form_item',
            [
                'label' => esc_html__('Repeater List', 'cleaning_service-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'form_text' => esc_html__('Title #1', 'cleaning_service-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'cleaning_service-core'),
                    ],
                    [
                        'form_text' => esc_html__('Title #2', 'cleaning_service-core'),
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

        $items = $settings['items'];
        $items_two = $settings['contact_form_item'];
        $form_items = $settings['form_item'];
        $items_additional = $settings['items_additional'];
        $checkbox_button = $settings['checkbox_button'];

        $select_array=[];
        foreach($form_items as $form_item){
            $select_array[$form_item['form_id']][]=$form_item;
        }

        $add_additional_title = $settings['add_additional_title'];
        $checkbox_title = $settings['checkbox_title'];
        $sub_heading = $settings['sub_heading'];
        $cart = $settings['cart_enable'];
        $form_top_heading = $settings['form_top_heading'];
        $field_per_column = $settings['field_per_column'];


?>
    <div class="block">
        <div class="container">
            <?php $this->cleaning_about_title(); ?>
            <div class="text-center max-800">
                <p class="p-lg"><?php echo $sub_heading; ?></p>
            </div>
            <div class="divider"></div>
            <form id="calculateForm" class="calculate-form" name="calculateForm" method="post" novalidate="novalidate">
                <?php wp_nonce_field('costcal_field', 'costcal_nonce'); ?>
                <div class="row">
                    <?php
                    $idsize = 0;
                    $count = 1;
                    $flag  = 0;
                    foreach ($items as $key => $value) {
                        if ($count == 1) {
                    ?>
                            <div class="col-sm-6">
                            <?php }
                                if ($value['input_type'] == 3) {
                                    $slider_text_field11 = $value['slider_text_field'];
                                    $slider_text_field = '';
                                    if ($slider_text_field11 == 'yes') {
                                        $slider_text_field = 1;
                                    } ?>
                                <div class="form-wrapper-grey">
                                    <div class="label"><?php echo $value['heading1_title']; ?></div>
                                    <div class="slider-with-input">
                                        <div class="rslider" data-min="<?php echo $value['min_slider_val']; ?>" data-max="<?php echo $value['max_slider_val']; ?>" data-step="<?php echo $value['step_slider_val']; ?>" data-price="<?php echo $value['slider_price_field']; ?>" data-start="<?php echo $value['start_slider_val']; ?>"></div>
                                        <?php
                                        $type = 'text';
                                        if (isset($slider_text_field)) {
                                            if ($slider_text_field == 1) {
                                                $type = 'text';
                                            } else {
                                                $type = 'hidden';
                                            }
                                        }
                                        ?>
                                        <input class="slidernumber" name="rangeSlider_calcinput<?php echo $idsize; ?>" type="<?php echo $type; ?>">
                                        <input value="<?php echo $value['heading1_title']; ?>" name="rangeSlider_title<?php echo $idsize; ?>" type="hidden">
                                    </div>
                                </div>
                            <?php
                        }
                        if ($value['input_type'] == 2) {
                            ?>
                                <div class="form-wrapper-grey">
                                    <div class="label"><?php echo $value['heading1_title']; ?></div>
                                    <input value="<?php echo $value['heading1_title']; ?>" name="calcselect_title<?php echo $idsize; ?>" type="hidden">
                                    <div class="select-wrapper select-wrapper--sm select-wrapper--full">
                                        <select name="calcselect_calcinput<?php echo $idsize; ?>" class="input-custom input-custom--sm calc_selectbox">      
                                            <option value="" data-price="0" selected="">Choose...</option>
                                            <?php 
                                                foreach($select_array[$value['input_id']] as $option){
                                                    echo '<option value="'.$option['form_name'].'" data-price="'.$option['form_value'].'">'.$option['form_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php
                        }
                        if ($value['input_type'] == 4) {
                            ?>
                                <div class="form-wrapper-grey calc_checkbox">
                                    <div class="label"><?php echo $value['heading1_title']; ?></div>
                                    <input value="<?php echo $value['heading1_title']; ?>" name="calccheckbox_title<?php echo $idsize; ?>" type="hidden">
                                    <label class="switch" for="calculateForm_checkbox<?php echo $idsize; ?>">
                                        <input value="yes" data-price="<?php echo $value['slider_price_field']; ?>" type="checkbox" id="calculateForm_checkbox<?php echo $idsize; ?>" name="calccheckbox_calcinput<?php echo $idsize; ?>">
                                        <div class="switchslider round"></div>
                                    </label>
                                </div>
                            <?php
                        } 
                            if ($count == $field_per_column) {
                            ?>
                                </div>
                            <?php
                            $count = 1;
                                    $flag  = 0;
                                }else {
                                    $count++;
                                    $flag = 1;
                                }
                                $idsize++;
                            }
                            if ($flag) {
                            ?>
                            </div>
                        <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="divider-lg"></div>
                        <div class="text-center">
                            <h4><?php echo $add_additional_title;?></h4>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <?php 
                   $idsize = 8;
                    foreach ($items_additional as $key => $value) { 
                            $add_heading1_title = $value['add_heading1_title'];
                        ?>
                        <div class="form-wrapper-grey">
                            <div class="label"><?php echo  $add_heading1_title;?></div>
                                <input value="<?php echo $add_heading1_title;?>:" name="calcselect_title<?php echo $idsize; ?>" type="hidden">
                                <div class="select-wrapper select-wrapper--sm select-wrapper--full">
                                <select name="calcselect_calcinput<?php echo $idsize; ?>" class="input-custom input-custom--sm calc_selectbox">      
                                    <option value="" data-price="0" selected="">Choose...</option>
                                    <?php 
                                        foreach($select_array[$value['add_input_id']] as $option){
                                            echo '<option value="'.$option['form_name'].'" data-price="'.$option['form_value'].'">'.$option['form_name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <?php 
                    $idsize++;} ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-wrapper-grey">
                            <div class="label"><?php echo  $checkbox_title;?>:</div>
                            <input value="<?php echo  $checkbox_title;?>:" name="calccheckboxgroup_title_btn" type="hidden">
                            <div class="button-group-pills" data-toggle="buttons">
                            <?php 
                            $idsize = 12;
                            foreach ($checkbox_button as $key => $value) { 
                                $checkbox_btn_price = $value['checkbox_btn_price'];
                                $chk_list_item_heading_title = $value['chk_list_item_heading_title'];
                               
                            ?>
                                <label class="btn btn-checkbox">
                                    <input type="checkbox" id="calculateForm_checkbox_btn" name="calccheckboxgroup_calcinput_btn[]" data-price="<?php echo $checkbox_btn_price;?>" value="<?php echo $chk_list_item_heading_title;?>">
                                    <div><?php echo $chk_list_item_heading_title;?></div>
                                </label>
                            <?php $idsize++;} ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="divider-lg"></div>
                <div class="text-center">
                    <h3><?php echo esc_html__('Final Cost', 'cleaning_services-core'); ?></h3>

                    <?php if ($cart == 'enable') { 
                        if (class_exists('woocommerce')) { ?>
                            <span class="final-price"><?php echo get_woocommerce_currency_symbol(); ?><span class="price">379.60</span></span>
                        <?php } else { ?>
                            <p><?php esc_html_e('Please active woocommerce plugin to cart calculat cost.', 'cleaing-services-core'); ?></p>
                        <?php } ?>
                        <input type="hidden" class="value_price" name="value_of_price">
                        <div class="divider-lg"></div>
                        <img src="<?php echo plugin_dir_url(__DIR__); ?>/assets/images/h-decor.png" class="img-responsive" alt="">
                        <div class="divider-xl"></div>
                        <div class="service-cart-btn">
                            <a href="javascript:void(0)" class="btn service-cart" data-product_id="999999999" data-service-title="Cleaning Cost Calculator"><?php echo esc_html('Order Now', 'cleaing-services-core'); ?></a>
                        </div>
                    <?php } else { ?>
                        <span class="final-price"><?php echo get_woocommerce_currency_symbol(); ?><span class="price">379.60</span></span>
                        <input type="hidden" class="value_price" name="value_of_price">
                        <div class="divider-lg"></div>
                        <img src="<?php echo plugin_dir_url(__DIR__); ?>/assets/images/h-decor.png" class="img-responsive" alt="">
                        <div class="divider-xl"></div>
                        <p class="p-lg"><?php echo $form_top_heading; ?> </p>
                        <div class="divider-lg"></div>
                </div>
                <div class="inputs-col">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $i = 1;
                            foreach ($items_two as $form_list_item) {

                                $terms_switch = $form_list_item['terms_switch_field'];
                                $terms_switch_link = $form_list_item['terms_switch_link'];
                                $terms_switch_field = '';
                                if ($terms_switch == 'yes') {
                                    $terms_switch_field = 1;
                                }
                             if ($form_list_item['form_input_type'] == 1) {
                                ?>
                                    <div class="input-wrapper">
                                        <input class="input-custom input-custom--sm input-full" name="<?php echo str_replace(' ', '_', $form_list_item['form_text']) . '_text'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>" type="text">
                                    </div>
                                <?php
                                }
                                if ($form_list_item['form_input_type'] == 4) {
                                ?>
                                    <div class="input-wrapper">
                                        <input class="input-custom input-custom--sm input-full" name="<?php echo str_replace(' ', '_', $form_list_item['form_text']) . '_email'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>" type="email">
                                    </div>
                                <?php
                                } 
                        $i++; }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $i = 1;
                            foreach ($items_two as $form_list_item) {

                                $terms_switch = $form_list_item['terms_switch_field'];
                                $terms_switch_link = $form_list_item['terms_switch_link'];

                                $terms_switch_field = '';
                                if ($terms_switch == 'yes') {
                                    $terms_switch_field = 1;
                                }
                            
                                if ($form_list_item['form_input_type'] == 2) {
                                ?>
                                    <div class="input-wrapper">
                                        <textarea class="textarea-custom input-full" name="<?php echo str_replace(' ', '_', $form_list_item['form_text']) . '_massage'; ?>" placeholder="<?php echo $form_list_item['form_text']; ?>"></textarea>
                                    </div>
                                <?php
                                } 
                            $i++; }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <?php
                            $i = 1;
                            foreach ($items_two as $form_list_item) {

                                $terms_switch = $form_list_item['terms_switch_field'];
                                $terms_switch_link = $form_list_item['terms_switch_link'];

                                $terms_switch_field = '';
                                if ($terms_switch == 'yes') {
                                    $terms_switch_field = 1;
                                }
                                if ($form_list_item['form_input_type'] == 3) {
                                    ?>
                                    <div class="text-center">
                                        <div class="divider-lg"></div>
                                        <?php
                                        $style = '';
                                        if ($terms_switch_field == 1) {
                                            $style = "disabled='disabled'";
                                        ?>
                                            <div class="d-flex">
                                                <div>
                                                    <label class="control control-checkbox">
                                                        <input id="term_checkbox" type="checkbox">
                                                        <div class="control-indicator"></div>
                                                    </label>
                                                </div>
                                                <div>
                                                <?php echo $terms_switch_link; ?></div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="divider-md"></div>
                                        <div class="send-after-success-massage"></div>

                                        <button id="calc_submit" name="name_submit" <?php echo $style; ?> type="submit" class="btn btn-lg"><?php echo $form_list_item['form_text']; ?></button>
                                    </div>
                                <?php
                                }
                        $i++; }
                            ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </form>
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

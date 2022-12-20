<?php
vc_map(array(
    "name" => esc_html__("Icon Hor",'cleaning_services-core'),
    "base" => "cleaning_services_icon_hor",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_parent" => array('only' => 'cleaning_services_icon_hor_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "col_no",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '',
            "description" => esc_html__('No of column.', 'cleaning_services-core'),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Design Select", 'cleaning_services-core'),
            "param_name" => "style",
            'value' => array(
                'One' => '1',
                'Two' => '2',
            ),
            "admin_label" => false,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Hax extra class', 'cleaning_services-core'),
            'param_name' => 'extra_class',
        ),
    )
));
$fonts_array=cleaning_services_add_fonts_family();
vc_map(array(
    "name" => esc_html__("Icon Hor items",'cleaning_services-core'),
    "base" => "cleaning_services_icon_hor_items",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_child" => array('only' => 'cleaning_services_icon_hor'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        $fonts_array[0],
        $fonts_array[1],
        $fonts_array[2],
        $fonts_array[3],
        $fonts_array[4],
        $fonts_array[5],
        $fonts_array[6],
        $fonts_array[7], 
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => "Heading 1st line",
            "param_name" => "heading",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Description", 'cleaning_services-core'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Icon_Hor extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Icon_Hor_Items extends WPBakeryShortCode {
        
    }

}

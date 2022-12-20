<?php
vc_map(array(
    "name" => esc_html__("Service Slider",'cleaning_services-core'),
    "description" => esc_html__("Service Slider", 'cleaning_services-core'),
    "base" => "cleaning_services_slider",
    "class" => "",
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "as_parent" => array('only' => 'cleaning_services_slider_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Service Type", 'cleaning_services-core'),
            "param_name" => "service_type",
            'value' => array(
                'Slider' => '1',
                'Grid' => '2',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("How many Slides to show?", 'cleaning_services-core'),
            "param_name" => "slides_to_show",
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '3',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("How many Slides to scroll?", 'cleaning_services-core'),
            "param_name" => "slides_to_scroll",
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_scroll' => '1',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Is infinite?", 'cleaning_services-core'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Autoplay", 'cleaning_services-core'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Autoplay Speed", 'cleaning_services-core'),
            "param_name" => "autoplay_speed",
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'autoplay_speed' => '2500',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Arrows", 'cleaning_services-core'),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Dots", 'cleaning_services-core'),
            "param_name" => "dots",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
        )
    )
));


$fonts_array=cleaning_services_add_fonts_family();
vc_map(array(
    "name" => esc_html__("Service Slider Items",'cleaning_services-core'),
    "base" => "cleaning_services_slider_items",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_child" => array('only' => 'cleaning_services_slider'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Type", 'cleaning_services-core'),
            "param_name" => "icon_select",
            'value' => array(
                'Icon' => 'icon',
                'Image' => 'image'
            ),
            "admin_label" => true,
        ),
        $fonts_array[0],
        $fonts_array[1],
        $fonts_array[2],
        $fonts_array[3],
        $fonts_array[4],
        $fonts_array[5],
        $fonts_array[6],
        $fonts_array[7], 
        array(
            "type" => "attach_image",
            "heading" => "Icon Image",
            "param_name" => "icon_img",
            "dependency" => Array(
                'element' => "icon_select", 
                'value' => 'image',
                ) 
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            "heading" => esc_html__("Service List", 'cleaning_services-core'),
            'param_name' => 'list',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'admin_label' => false,
                    'heading' => __('List Item', 'cleaning_services-core'),
                    'param_name' => 'list_item',
                    'value' => 'Vacuum / mop floors',
                ),
            )
        ),
        array(
            "type" => "vc_link",
            "heading" => "Action Button",
            "param_name" => "call_action",
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Slider extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Slider_Items extends WPBakeryShortCode {
        
    }

}
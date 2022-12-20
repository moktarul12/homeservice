<?php
vc_map(array(
    "name" => esc_html__("Service Grid  Container",'cleaning_services-core'),
    "description" => esc_html__("Service Grid Container", 'cleaning_services-core'),
    "base" => "cleaning_services_banner_container",
    "class" => "",
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "as_parent" => array('only' => 'cleaning_services_banner'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Design Select", 'cleaning_services-core'),
            "param_name" => "design_select",
            'value' => array(
                'One' => '1',
                'Two' => '2',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Mobile First", 'cleaning_services-core'),
            "param_name" => "mobile_first",
            'group' => esc_html__( 'Slider Settings'),
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("How many Slides to show?", 'cleaning_services-core'),
            "param_name" => "slides_to_show",
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '1',
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
                'autoplay_speed' => '2000',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Arrows", 'cleaning_services-core'),
            "param_name" => "arrows",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Dots", 'cleaning_services-core'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => esc_html__( 'Slider Settings'),
            "admin_label" => true,
        )
    )
));

vc_map(
    array(
        "name" => esc_html__("Service Grid", 'cleaning_services-core'),
        "description" => esc_html__("Set banners here", 'cleaning_services-core'),
        "base" => "cleaning_services_banner",
        "class" => "",
        "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
        "weight" => 1000,
        "controls" => "full",
        "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => "Heading",
                "param_name" => "heading",
                "admin_label" => true,
            ),
            array(
                "type" => "textarea_html",
                "heading" => "Content",
                "param_name" => "content",
                "admin_label" => true,
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'cleaning_services-core'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Select image from media library.', 'cleaning_services-core'),
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
    )
);

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Banner_Container extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Banner extends WPBakeryShortCode {
        
    }

}
<?php
vc_map(array(
    "name" => esc_html__("Testimonials 2", 'cleaning_services-core'),
    "base" => "cleaning_testimonials_2",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_parent" => array('only' => 'cleaning_testimonials_items_2'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'cleaning_services-core'),
            'param_name' => 'extra_class',
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Mobile First", 'cleaning_services-core'),
            "param_name" => "mobile_first",
            'group' => __( 'Slider Settings'),
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'cleaning_services-core'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to scroll?", 'cleaning_services-core'),
            "param_name" => "slides_to_scroll",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_scroll' => '1',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Is infinite?", 'cleaning_services-core'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Autoplay", 'cleaning_services-core'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Autoplay Speed", 'cleaning_services-core'),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'autoplay_speed' => '2000',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'cleaning_services-core'),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", 'cleaning_services-core'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        )
    )
));

vc_map(array(
    "name" => esc_html__("Testimonials Item 2", 'cleaning_services-core'),
    "base" => "cleaning_testimonials_items_2",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_child" => array('only' => 'cleaning_testimonials'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Reviewer Name", 'cleaning_services-core'),
            "param_name" => "rev_name",
        ),
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Reviewer From", 'cleaning_services-core'),
            "param_name" => "rev_from",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Review Text", 'cleaning_services-core'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Ratting', 'cleaning_services-core'),
            'param_name' => 'ratting',
            'value' => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Slider Image", 'cleaning_services-core'),
            "param_name" => "image",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_cleaning_testimonials_2 extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_cleaning_testimonials_items_2 extends WPBakeryShortCode {
        
    }

}

<?php
vc_map(array(
    "name" => esc_html__("Services  Discount",'cleaning_services-core'),
    "base" => "cleaning_services_discount",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_parent" => array('only' => 'cleaning_services_discount_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

vc_map(array(
    "name" => esc_html__("Service Discount Items",'cleaning_services-core'),
    "base" => "cleaning_services_discount_items",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_child" => array('only' => 'cleaning_services_discount'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "admin_label" => true,
            "heading" => "Design Select",
            "param_name" => "design_select",
            "value" => array(
                "One" => "1",
                "Two" => "2",
            ),
        ),
        array(
            "type" => "dropdown",
            "admin_label" => true,
            "heading" => "Background Color",
            "param_name" => "color",
            "value" => array(
                "Color One" => "1",
                "Color Two" => "2",
                "Color Three" => "3",
            ),
            "dependency" => array(
                "element" => "design_select",
                "value" => "1"
            ),
            "std" => '1',
        ),
        array(
            "type" => "dropdown",
            "admin_label" => true,
            "heading" => "Text Color",
            "param_name" => "text_color",
            "value" => array(
                "Color One" => "1",
                "Color Two" => "2",
                "Color Three" => "3",
            ),
            "dependency" => array(
                "element" => "design_select",
                "value" => "2"
            ),
            "std" => '1',
        ),
        array(
            "type" => "textarea_html",
            "heading" => "Discount Type",
            "param_name" => "content",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Discount Type', 'cleaning_services-core'),
            "param_name" => "discount_type",
            "admin_label" => true,
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Discount extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Discount_Items extends WPBakeryShortCode {
        
    }

}

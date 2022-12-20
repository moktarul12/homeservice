<?php  
vc_map(array(
    "name" => esc_html__("Counterbox Item",'cleaning_services-core'),
    "base" => "cleaning_services_counterbox_item",
    "category" => 'Cleaning Services',
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "iconpicker",
            "heading" => "Icon",
            "param_name" => "icon",
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Counter Value(must be numeric)",
            "param_name" => "count_number",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Counter HTML(E.g.: 50 000)",
            "param_name" => "content",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Speed(must be numeric)",
            "param_name" => "number_scrolling_speed",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Shortcode_Cleaning_Services_Counterbox_Item extends WPBakeryShortCode {
    }
}
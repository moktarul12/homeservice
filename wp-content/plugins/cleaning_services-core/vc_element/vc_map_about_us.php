<?php
vc_map(array(
    "name" => esc_html__("About Tabs",'cleaning_services-core'),
    "description" => esc_html__("About Our Company", 'cleaning_services-core'),
    "base" => "cleaning_about_tabs",
    "class" => "",
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "content_element" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "value" => "About Our Company",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Right Image", ULTIMA_NAME),
            "param_name" => "image",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

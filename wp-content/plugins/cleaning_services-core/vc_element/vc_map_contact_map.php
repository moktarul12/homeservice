<?php
vc_map(array(
    "name" => esc_html__("Contact Map",'cleaning_services-core'),
    "base" => "cleaning_services_contact_map",
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Gmap Api Key", 'cleaning_services-core'),
            "param_name" => "gmap_api_key",
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Latitude", 'cleaning_services-core'),
            "param_name" => "gmap_latitude",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Longitude", 'cleaning_services-core'),
            "param_name" => "gmap_longitude",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Zoom", 'cleaning_services-core'),
            "param_name" => "zoom",
            "value" => "10",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Slider Image", 'cleaning_services-core'),
            "param_name" => "gmap_marker",
        ),

        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
        ),
    )
));
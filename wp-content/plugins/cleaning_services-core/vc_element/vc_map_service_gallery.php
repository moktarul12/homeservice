<?php
vc_map(
        array(
            "name" => esc_html__("Service Gallery", 'cleaning_services-core'),
            "base" => "cleaning_services_gallery",
            "class" => "",
            "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
            "weight" => 1000,
            "controls" => "full",
            "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
            "params" => array(
                array(
                    "type" => "textarea_html",
                    "heading" => "Content",
                    "param_name" => "content",
                ),
                array(
                    "type" => "vc_link",
                    "heading" => "Action Button",
                    "param_name" => "call_action",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'heading' => esc_html__('Gallery List', 'cleaning-senvices'),
                    'param_name' => 'gallery_list',
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "class" => "",
                            "heading" => esc_html__("Tab Image", 'cleaning-senvices'),
                            "param_name" => "image",
                            "value" => "",
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'cleaning-senvices'),
                            'param_name' => 'title',
                        ), 
                        array(
                            "type" => "textfield",
                            "heading" => "URL",
                            "param_name" => "url",
                        ),              
                    )
                ),               
                array(
                    "type" => "attach_image",
                    "class" => "",
                    "heading" => esc_html__("Gallery BG", 'cleaning-senvices'),
                    "param_name" => "gallery_image",
                    "value" => "",
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Add Extra Class",
                    "param_name" => "extra_class",
                ),
            )
        )
);
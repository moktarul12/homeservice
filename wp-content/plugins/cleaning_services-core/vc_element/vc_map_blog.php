<?php
vc_map(array(
    "name" => esc_html__("Blog posts",'cleaning_services-core'),
    "base" => "cleaning_services_post_loop",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => 'Cleaning Services',
    "params" => array(
        array(
            "type" => "loop",
            "class" => "",
            "heading" => esc_html__("Select post loop", "cleaning_services-core"),
            "param_name" => "post_loop",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'cleaning_services-core'),
            'param_name' => 'layout',
            'value' => array(
                'Default' => '',
                'Card view' => 'card',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Pagination', 'cleaning_services-core'),
            'param_name' => 'is_pagination',
            'value' => array(
                'No pagination or post navigation' => '',
                'Post Navigation' => 'navigation',
                'Post Ajax load mote' => 'ajax-load',
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'cleaning_services-core'),
            'param_name' => 'extra_class',
        ),
    )
));
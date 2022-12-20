<?php
vc_map(array(
    "name" => esc_html__("Team Carousel",'cleaning_services-core'),
    "base" => "cleaning_services_team_carousel",
    //"icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_parent" => array('only' => 'cleaning_services_team'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "team_col",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '',
            "description" => esc_html__('No of column of the team.', 'cleaning_services-core'),
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Design Select",
            "param_name" => "style",
            "value" => array(
                "One" => "1",
                "Two" => "2",
            ),
            "std" => '1',
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
                'slides_to_show' => '3',
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
            "heading" => __("How many Slides to show?", 'cleaning_services-core'),
            "param_name" => "slides_to_scroll",
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
    ),
   "js_view" => 'VcColumnView',
));

vc_map(array(
    "name" => esc_html__("Our Team",'cleaning_services-core'),
    "base" => "cleaning_services_team",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services-core'),
    "as_child" => array('only' => 'cleaning_services_team_carousel'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name Of Team Member", 'cleaning_services-core'),
            "param_name" => "name",
            "value" => "",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Designation of Team Member", 'cleaning_services-core'),
            "param_name" => "designation",
            "value" => "",
            "admin_label" => true,
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Description", 'cleaning_services-core'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Picture Of Team Member", 'cleaning_services-core'),
            "param_name" => "image",
            "value" => "",
        ),      
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Facebook", 'cleaning_services-core'),
            "param_name" => "facebook_url",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Twitter", 'cleaning_services-core'),
            "param_name" => "twitter_url",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Instagram", 'cleaning_services-core'),
            "param_name" => "instagram_url",
            "value" => "",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Team_Carousel extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Team extends WPBakeryShortCode {
        
    }

}
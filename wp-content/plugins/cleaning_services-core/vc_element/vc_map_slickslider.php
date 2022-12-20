<?php
vc_map(
	array(
		'name'                    => 'Slick Slider',
		'base'                    => 'cleaning_services_slick_slider',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'cleaning_services_slick_slider_item' ),
		'content_element'         => true,
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'show_settings_on_create' => true,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Slider Select', ULTIMA_NAME ),
				'param_name'  => 'slider_select',
				'value'       => array(
					'Design 1' => 'design_1',
					'Design 2' => 'design_2',
				),
				'admin_label' => true,
			),
			array(
				'type'       => 'textfield',
				'heading'    => 'Extra Class',
				'param_name' => 'extra_class',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable autoplay', ULTIMA_NAME ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Autoplay Speed', ULTIMA_NAME ),
				'param_name'  => 'autoplay_speed',
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
				'value'       => array(
					'autoplay_speed' => '3000',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Arrows', ULTIMA_NAME ),
				'param_name'  => 'arrows',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Dots', ULTIMA_NAME ),
				'param_name'  => 'dots',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Fading?', ULTIMA_NAME ),
				'param_name'  => 'fade',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Pause On Hover?', ULTIMA_NAME ),
				'param_name'  => 'pause_on_hover',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Pause On Dots Hover?', ULTIMA_NAME ),
				'param_name'  => 'pause_on_dots_hover',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
		),
	)
);

vc_map(
	array(
		'name'                    => esc_html__( 'Slick Slider Items', 'cleaning_services-core' ),
		'base'                    => 'cleaning_services_slick_slider_item',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'cleaning_services_slick_slider' ),
		'content_element'         => true,
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Slider Image', ULTIMA_NAME ),
				'param_name' => 'image',
			),
			array(
				'type'        => 'textfield',
				'heading'     => 'First Title',
				'param_name'  => 'first_title',
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => 'Second Title',
				'param_name'  => 'second_title',
				'admin_label' => true,
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => 'Content',
				'param_name' => 'content',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => 'Action Button',
				'param_name' => 'call_action',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => 'Action Button Two',
				'param_name' => 'call_action_2',
			),
			array(
				'type'       => 'textfield',
				'heading'    => 'Add Extra Class',
				'param_name' => 'extra_class',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Unique ID', ULTIMA_NAME ),
				'param_name' => 'unqid',
				'value'      => array(
					'unq' . str_replace( '.', '', str_replace( ' ', '', microtime() ) ) . rand( 1, 999 ) => 'unq' . str_replace( '.', '', str_replace( ' ', '', microtime() ) ) . rand( 1, 999 ),
				),
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	class WPBakeryShortCode_Cleaning_Services_Slick_Slider extends WPBakeryShortCodesContainer {

	}

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_Cleaning_Services_Slick_Slider_Item extends WPBakeryShortCode {

	}

}



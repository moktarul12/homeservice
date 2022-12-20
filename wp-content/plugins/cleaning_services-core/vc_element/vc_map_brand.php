<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Brand Slider', 'cleaning_services-core' ),
		'base'                    => 'cleaning_services_brand_slider',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'cleaning_services_brand_slider_item' ),
		'content_element'         => true,
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'show_settings_on_create' => true,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'       => 'textfield',
				'heading'    => 'Extra Class',
				'param_name' => 'extra_class',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Mobile First', 'cleaning_services-core' ),
				'param_name'  => 'mobile_first',
				'group'       => __( 'Slider Settings' ),
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'How many Slides to show?', 'cleaning_services-core' ),
				'param_name'  => 'slides_to_show',
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
				'value'       => array(
					'slides_to_show' => '7',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'How many Slides to show?', 'cleaning_services-core' ),
				'param_name'  => 'slides_to_scroll',
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
				'value'       => array(
					'slides_to_scroll' => '1',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Is infinite?', 'cleaning_services-core' ),
				'param_name'  => 'infinite',
				'value'       => array(
					'Yes' => 'true',
					'No'  => 'false',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Autoplay', 'cleaning_services-core' ),
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
				'heading'     => __( 'How many Slides to show?', 'cleaning_services-core' ),
				'param_name'  => 'slides_to_scroll',
				'group'       => __( 'Slider Settings' ),
				'admin_label' => true,
				'value'       => array(
					'autoplay_speed' => '2000',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Arrows', 'cleaning_services-core' ),
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
				'heading'     => __( 'Enable Dots', 'cleaning_services-core' ),
				'param_name'  => 'dots',
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
		'name'                        => 'Brand Slider Items',
		'base'                        => 'cleaning_services_brand_slider_item',
		'category'                    => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                    => array( 'only' => 'cleaning_services_brand_slider' ),
		'content_element'             => true,
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
			'show_settings_on_create' => true,
		'params'                      => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Slider Image', ULTIMA_NAME ),
				'param_name' => 'image',
			),

			array(
				'type'       => 'vc_link',
				'holder'     => 'div',
				'heading'    => 'Action Button',
				'param_name' => 'call_action',

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

	class WPBakeryShortCode_Cleaning_Services_Brand_Slider extends WPBakeryShortCodesContainer {

	}

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_Cleaning_Services_Brand_Slider_Item extends WPBakeryShortCode {

	}

}



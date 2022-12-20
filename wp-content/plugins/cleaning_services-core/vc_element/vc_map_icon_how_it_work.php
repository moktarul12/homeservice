<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Icon How It Works', 'cleaning_services-core' ),
		'base'                    => 'cleaning_services_icon_how_it_works',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'cleaning_services_how_it_works_items' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Column no',
				'param_name'  => 'col_no',
				'value'       => array(
					'2 Column' => '2',
					'3 Column' => '3',
					'4 Column' => '4',
				),
				'std'         => '',
				'description' => esc_html__( 'No of column.', 'cleaning_services-core' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Icon extra class', 'cleaning_services-core' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

vc_map(
	array(
		'name'                    => 'Icon How It Works items',
		'base'                    => 'cleaning_services_how_it_works_items',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'cleaning_services_icon_how_it_works' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Number',
				'param_name'  => 'number',
			),
			array(
				'type'        => 'textfield',
				'admin_label' => false,
				'heading'     => esc_html__( 'Title', 'cleaning_services-core' ),
				'param_name'  => 'title',
				'value'       => '',
			),
			array(
				'type'        => 'textfield',
				'admin_label' => false,
				'heading'     => esc_html__( 'Sub Title', 'cleaning_services-core' ),
				'param_name'  => 'subtitle',
				'value'       => '',
			),

			array(
				'type'        => 'textarea_html',
				'holder'      => 'div',
				'admin_label' => true,
				'param_name'  => 'content',
			),
			array(
				'type'       => 'vc_link',
				'holder'     => 'div',
				'heading'    => 'Action Button',
				'param_name' => 'call_action',

			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'cleaning_services-core' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	class WPBakeryShortCode_cleaning_services_icon_how_it_works extends WPBakeryShortCodesContainer {

	}

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_cleaning_services_how_it_works_items extends WPBakeryShortCode {

	}

}

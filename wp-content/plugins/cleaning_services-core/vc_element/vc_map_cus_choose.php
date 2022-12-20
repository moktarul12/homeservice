<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Customer Choose Us', 'cleaning_services-core' ),
		'base'                    => 'cleaning_cus_choose',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'cleaning_cus_choose_items' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image', 'cleaning_services-core' ),
				'param_name' => 'image',
			),
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
				'heading'    => esc_html__( 'Icon Hax extra class', 'cleaning_services-core' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

vc_map(
	array(
		'name'                    => 'Customer Choose Us Items',
		'base'                    => 'cleaning_cus_choose_items',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'cleaning_cus_choose' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Title',
				'param_name'  => 'title',
			),
			array(
				'type'        => 'textarea_html',
				'admin_label' => false,
				'heading'     => esc_html__( 'Description', 'cleaning_services-core' ),
				'param_name'  => 'content',
				'value'       => '',
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	class WPBakeryShortCode_cleaning_cus_choose extends WPBakeryShortCodesContainer {

	}

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_cleaning_cus_choose_items extends WPBakeryShortCode {

	}

}

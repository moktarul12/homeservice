<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Cleaning Services Cost Calculator', 'cleaning_services-core' ),
		'base'                    => 'cleaning_cost_calculator',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => __( 'Page Heading', "cleaning_services-core'" ),
				'param_name'  => 'heading',
			),
			array(
				'type'        => 'textarea',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => __( 'Page Sub Heading', "cleaning_services-core'" ),
				'param_name'  => 'sub_heading',
			),
			array(
				'type'       => 'param_group',
				'value'      => '',
				'heading'    => __( 'List Items', 'cleaning_services-core' ),
				'param_name' => 'heading1_list',
				'params'     => array(
					array(
						'type'        => 'textfield',
						'value'       => '',
						'heading'     => __( 'Title', 'cleaning_services-core' ),
						'param_name'  => 'heading1_title',
						'admin_label' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Input type', 'cleaning_services-core' ),
						'param_name'  => 'input_type',
						'description' => esc_html__( 'You can select icon size', 'cleaning_services-core' ),
						'admin_label' => true,
						'value'       => array(
							esc_html__( 'Select Input Type', 'cleaning_services-core' )    => '',
							esc_html__( 'Text', 'cleaning_services-core' )    => '1',
							esc_html__( 'Select Box', 'cleaning_services-core' )    => '2',
							esc_html__( 'Slider', 'cleaning_services-core' )    => '3',
							esc_html__( 'Checkbox', 'cleaning_services-core' )   => '4',
							esc_html__( 'Checkbox Group', 'cleaning_services-core' )    => '5',
							esc_html__( 'Plane Text', 'cleaning_services-core' )    => '6',
						),
					),
					// check Box
					array(
						'type'       => 'param_group',
						'value'      => '',
						'heading'    => __( 'List Checkbox Items', 'cleaning_services-core' ),
						'param_name' => 'chk_list_item',
						'params'     => array(
							array(
								'type'        => 'textfield',
								'value'       => '',
								'admin_label' => true,
								'heading'     => __( 'Title', 'cleaning_services-core' ),
								'param_name'  => 'chk_list_item_heading_title',
							),
							array(
								'type'        => 'textfield',
								'value'       => '',
								'admin_label' => true,
								'heading'     => __( 'Price', 'cleaning_services-core' ),
								'param_name'  => 'chk_list_item_price_field',
							),

						),
						'dependency' => array(
							'element' => 'input_type',
							'value'   => '5',
						),
					),
					// Select Box
					array(
						'type'       => 'param_group',
						'value'      => '',
						'heading'    => __( 'List Select Items', 'cleaning_services-core' ),
						'param_name' => 'sec_list_item',
						'params'     => array(
							array(
								'type'        => 'textfield',
								'value'       => '',
								'admin_label' => true,
								'heading'     => __( 'Title', 'cleaning_services-core' ),
								'param_name'  => 'sec_list_item_heading_title',
							),
							array(
								'type'        => 'textfield',
								'value'       => '',
								'admin_label' => true,
								'heading'     => __( 'Price', 'cleaning_services-core' ),
								'param_name'  => 'sec_list_item_price_field',
							),
						),
						'dependency' => array(
							'element' => 'input_type',
							'value'   => '2',
						),
					),
					// Slider Box
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Slider Text Field On/Off', 'cleaning_services-core' ),
						'param_name'  => 'slider_text_field',
						'admin_label' => true,
						'description' => esc_html__( 'You can select input field after slider', 'cleaning_services-core' ),
						'value'       => array(
							esc_html__( 'Select', 'cleaning_services-core' )    => '',
							esc_html__( 'ON', 'cleaning_services-core' )    => '1',
							esc_html__( 'OFF', 'cleaning_services-core' )    => '0',
						),
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					array(
						'type'        => 'textfield',
						'holder'      => 'div',
						'admin_label' => true,
						'heading'     => __( 'Minimum Value', "cleaning_services-core'" ),
						'param_name'  => 'min_slider_val',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					array(
						'type'        => 'textfield',
						'holder'      => 'div',
						'admin_label' => true,
						'heading'     => __( 'Maximum Value', "cleaning_services-core'" ),
						'param_name'  => 'max_slider_val',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					array(
						'type'        => 'textfield',
						'holder'      => 'div',
						'admin_label' => true,
						'heading'     => __( 'Slider Step', "cleaning_services-core'" ),
						'param_name'  => 'step_slider_val',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => __( 'Slider Per Step Price', 'cleaning_services-core' ),
						'param_name'  => 'slider_price_field',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					array(
						'type'        => 'colorpicker',
						'admin_label' => true,
						'heading'     => __( 'Slider Color', 'cleaning_services-core' ),
						'param_name'  => 'color_slider',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '3',
						),
					),
					// check field
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => __( 'checkbox field Price', 'cleaning_services-core' ),
						'param_name'  => 'chk_price_field',
						'dependency'  => array(
							'element' => 'input_type',
							'value'   => '4',
						),
					),

					// div size
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Input type', 'cleaning_services-core' ),
						'param_name'  => 'div_css_type',
						'description' => esc_html__( 'You can select icon size', 'cleaning_services-core' ),
						'admin_label' => true,
						'value'       => array(
							esc_html__( 'Select Div Size', 'cleaning_services-core' )    => '',
							esc_html__( 'Column 1', 'cleaning_services-core' )    => '1',
							esc_html__( 'Column 2', 'cleaning_services-core' )    => '2',
							esc_html__( 'Column 3', 'cleaning_services-core' )    => '3',
							esc_html__( 'Column 4', 'cleaning_services-core' )    => '4',
							esc_html__( 'Column 5', 'cleaning_services-core' )    => '5',
							esc_html__( 'Column 6', 'cleaning_services-core' )    => '6',
							esc_html__( 'Column 7', 'cleaning_services-core' )    => '7',
							esc_html__( 'Column 8', 'cleaning_services-core' )    => '8',
							esc_html__( 'Column 9', 'cleaning_services-core' )    => '9',
							esc_html__( 'Column 10', 'cleaning_services-core' )    => '10',
							esc_html__( 'Column 11', 'cleaning_services-core' )    => '11',
							esc_html__( 'Column 12', 'cleaning_services-core' )    => '12',
						),
					),
				),
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => __( 'Extra Class', "cleaning_services-core'" ),
				'param_name'  => 'extra_class',
			),
		),
	)
);
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_cleaning_cost_calculator extends WPBakeryShortCode {

	}

}

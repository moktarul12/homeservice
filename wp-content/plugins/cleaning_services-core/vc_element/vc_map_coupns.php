<?php
vc_map(
	array(
		'name'     => esc_html__( 'Coupns', 'cleaning_services-core' ),
		'base'     => 'cleaning_serivces_coupns',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category' => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'params'   => array(
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Column no',
				'param_name'  => 'column',
				'value'       => array(
					'2 Column' => '2',
					'3 Column' => '3',
					'4 Column' => '4',
				),
				'std'         => '',
				'description' => esc_html__( 'No of column.', 'cleaning_services-core' ),
			),
			array(
				'type'        => 'dropdown',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Design Select',
				'param_name'  => 'design_select',
				'value'       => array(
					'With Carousel'    => 'with_carousel',
					'Without Carousel' => 'without_carousel',
				),
				'std'         => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Posts Per Page', 'cleaning_services-core' ),
				'param_name' => 'per_page',
				'value'      => 2,
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
					'slides_to_show' => '2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'How many Slides to scroll?', 'cleaning_services-core' ),
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

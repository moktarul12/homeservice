<?php
vc_map(
	array(
		'name'     => esc_html__( 'Cleaning Gallary', 'cleaning_services-core' ),
		'base'     => 'gallaries',
		'class'    => '',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category' => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'params'   => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Gallary', 'cleaning_services-core' ),
				'param_name'  => 'showposts',
				'value'       => '10',
				'description' => esc_html__( 'Set how many gallary image will display.', 'cleaning_services-core' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Order By', 'cleaning_services-core' ),
				'param_name'  => 'orderby',
				'value'       => array(
					'Date'     => 'date',
					'ID'       => 'ID',
					'Title'    => 'title',
					'Name'     => 'name',
					'Modified' => 'modified',
					'Rand'     => 'rand',
				),
				'description' => esc_html__( 'Select order type.', 'cleaning_services-core' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Sort Order', 'cleaning_services-core' ),
				'param_name'  => 'order',
				'value'       => array(
					'Descending' => 'DESC',
					'Ascending'  => 'ASC',
				),
				'description' => esc_html__( 'Select sorting order.', 'cleaning_services-core' ),
				'admin_label' => true,
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
				'heading'     => __( 'How many scroll to show?', 'cleaning_services-core' ),
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
				'heading'     => __( 'How many Slides to dpeed?', 'cleaning_services-core' ),
				'param_name'  => 'autoplay_speed',
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
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Icon Thumb box extra class', 'cleaning_services-core' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

<?php
vc_map(
	array(
		'name'     => esc_html__( 'Banner Calendar', 'cleaning_services-core' ),
		'base'     => 'cleaning_services_banner_calendar',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category' => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'params'   => array(
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Picture Of Cover Front', 'cleaning_services-core' ),
				'param_name' => 'cover_front',
				'value'      => '',
			),
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Picture Of Cover Back', 'cleaning_services-core' ),
				'param_name' => 'cover_back',
				'value'      => '',
			),
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Picture Of Calendar Img', 'cleaning_services-core' ),
				'param_name' => 'calendar_img',
				'value'      => '',
			),
			array(
				'type'        => 'textfield',
				'admin_label' => false,
				'heading'     => esc_html__( 'Title', 'cleaning_services-core' ),
				'param_name'  => 'title',
				'value'       => '',
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Banner Paragraph ', 'cleaning_services-core' ),
				'param_name' => 'content',
				'value'      => '',
			),
			array(
				'type'        => 'textfield',
				'admin_label' => false,
				'heading'     => esc_html__( 'Action Button Title', 'cleaning_services-core' ),
				'param_name'  => 'action_title',
				'value'       => '',
			),
			array(
				'type'       => 'vc_link',
				'holder'     => 'div',
				'heading'    => esc_html__( 'Action Button', 'cleaning_services-core' ),
				'param_name' => 'call_action',
			),
		),
	)
);

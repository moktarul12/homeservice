<?php
vc_map(
	array(
		'name'     => esc_html__( 'Guarantee Banner', 'cleaning_services-core' ),
		'base'     => 'cleaning_services_guarantee_banner',
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category' => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'params'   => array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Banner Title', 'cleaning_services-core' ),
				'param_name' => 'title',
				'value'      => '',
			),
			array(
				'type'        => 'textarea_html',
				'admin_label' => false,
				'heading'     => esc_html__( 'Description', 'cleaning_services-core' ),
				'param_name'  => 'content',
				'value'       => '',
			),
			array(
				'type'       => 'attach_image',
				'holder'     => 'div',
				'class'      => '',
				'heading'    => esc_html__( 'Picture Of Team Member', 'cleaning_services-core' ),
				'param_name' => 'image',
				'value'      => '',
			),
		),
	)
);

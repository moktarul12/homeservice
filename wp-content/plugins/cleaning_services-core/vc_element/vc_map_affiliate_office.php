<?php
vc_map(
	array(
		'name'     => esc_html__( 'Affiliate Office', 'cleaning_services-core' ),
		'base'     => 'affiliate_office',
		'icon'     => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category' => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'params'   => array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Title ', 'cleaning_services-core' ),
				'param_name' => 'title',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Location ', 'cleaning_services-core' ),
				'param_name' => 'place',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Phone ', 'cleaning_services-core' ),
				'param_name' => 'location',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Fax ', 'cleaning_services-core' ),
				'param_name' => 'fax',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Email ', 'cleaning_services-core' ),
				'param_name' => 'email',
				'value'      => '',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Google Plus URL', 'cleaning_services-core' ),
				'param_name' => 'google_plus',
				'value'      => '#',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Facebook URL', 'cleaning_services-core' ),
				'param_name' => 'facebook',
				'value'      => '#',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Twitter URL', 'cleaning_services-core' ),
				'param_name' => 'twitter',
				'value'      => '#',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Instagram URL', 'cleaning_services-core' ),
				'param_name' => 'instagram',
				'value'      => '#',
			),
			array(
				'type'        => 'textarea_html',
				'admin_label' => false,
				'heading'     => esc_html__( 'Address', 'cleaning_services-core' ),
				'param_name'  => 'content',
				'value'       => '',
			),
		),
	)
);

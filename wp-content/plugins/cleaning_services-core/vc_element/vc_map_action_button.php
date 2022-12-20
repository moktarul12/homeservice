<?php
/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
	foreach ( $cf7 as $cform ) {
		$contact_forms[ $cform->post_title ] = $cform->ID;
	}
} else {
	$contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
}

$fonts_array = cleaning_services_add_fonts_family();
vc_map(
	array(
		'name'        => esc_html__( 'Action Button', 'cleaning_services-core' ),
		'base'        => 'cleaning_sevice_action_button',
		'description' => esc_html__( 'Action Button For Pop Up Or Modal', 'cleaning_services-core' ),
		'category'    => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		// "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'params'      => array(
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'heading'     => 'Button Title',
				'param_name'  => 'title',
				'admin_label' => true,
			),
			$fonts_array[0],
			$fonts_array[1],
			$fonts_array[2],
			$fonts_array[3],
			$fonts_array[4],
			$fonts_array[5],
			$fonts_array[6],
			$fonts_array[7],
			array(
				'type'       => 'vc_link',
				'holder'     => 'div',
				'heading'    => 'Action Button',
				'param_name' => 'call_action',
			),
			array(
				'type'       => 'textfield',
				'heading'    => 'Add Extra Class',
				'param_name' => 'extra_class',
			),
		),
	)
);


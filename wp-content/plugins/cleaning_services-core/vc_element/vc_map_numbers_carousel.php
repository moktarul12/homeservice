<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Number Carousel', 'cleaning_services-core' ),
		'base'                    => 'cleaning_services_numbers_carousel',
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'cleaning_services_numbers_carousel_items' ),
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
				'type'        => 'dropdown',
				'holder'      => 'div',
				'admin_label' => true,
				'heading'     => 'Design Select',
				'param_name'  => 'style',
				'value'       => array(
					'One' => '1',
					'Two' => '2',
				),
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
					'slides_to_show' => '4',
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
$fonts_array = cleaning_services_add_fonts_family();
vc_map(
	array(
		'name'                    => esc_html__( 'Number Carousel Items', 'cleaning_services-core' ),
		'base'                    => 'cleaning_services_numbers_carousel_items',
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'cleaning_services_numbers_carousel' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => 'Title',
				'param_name'  => 'title',
				'admin_label' => true,
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Counter Value(must be numeric)', 'cleaning_services-core' ),
				'param_name' => 'count_number',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Symble', 'cleaning_services-core' ),
				'param_name' => 'symble',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Speed(must be numeric)', 'cleaning_services-core' ),
				'param_name' => 'number_scrolling_speed',
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
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'cleaning_services-core' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => esc_html__( 'Select image from media library.', 'cleaning_services-core' ),
				'admin_label' => true,
			),
			array(
				'type'       => 'textfield',
				'heading'    => 'Add Extra Class',
				'param_name' => 'extra_class',
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

	class WPBakeryShortCode_Cleaning_Services_Numbers_Carousel extends WPBakeryShortCodesContainer {

	}

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

	class WPBakeryShortCode_Cleaning_Services_Numbers_Carousel_Items extends WPBakeryShortCode {

	}

}

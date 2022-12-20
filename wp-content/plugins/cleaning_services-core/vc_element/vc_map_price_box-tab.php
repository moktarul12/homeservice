<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Price Box Tab Container', 'cleaning_services-core' ),
		'base'                    => 'price_box_tab_container',
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_parent'               => array( 'only' => 'price_box_tab' ),
		'content_element'         => true,
		'show_settings_on_create' => false,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Mobile First', 'cleaning_services-core' ),
				'param_name'  => 'mobile_first',
				'group'       => __( 'Slider Settings' ),
				'value'       => array(
					'No'  => 'false',
					'Yes' => 'true',
				),
				'admin_label' => false,
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
				'admin_label' => false,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Autoplay', 'cleaning_services-core' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'No'  => 'false',
					'Yes' => 'true',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => false,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Enable Arrows', 'cleaning_services-core' ),
				'param_name'  => 'arrows',
				'value'       => array(
					'No'  => 'false',
					'Yes' => 'true',
				),
				'group'       => __( 'Slider Settings' ),
				'admin_label' => false,
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
				'admin_label' => false,
			),
		),
	)
);


vc_map(
	array(
		'name'                    => esc_html__( 'Price Box Tab', 'cleaning_services-core' ),
		'base'                    => 'price_box_tab',
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'price_box_tab_container' ),
		'as_parent'               => array( 'only' => 'price_box_tab_item' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => 'Tab Title',
				'param_name'  => 'tab_title',
				'admin_label' => false,
			),
		),
	)
);

vc_map(
	array(
		'name'                    => esc_html__( 'Price Box Tab Items', 'cleaning_services-core' ),
		'base'                    => 'price_box_tab_item',
		'icon'                    => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
		'category'                => esc_html__( 'Cleaning Services', 'cleaning_services-core' ),
		'as_child'                => array( 'only' => 'price_box_tab' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title text', 'cleaning_services-core' ),
				'param_name'  => 'title_text',
				'admin_label' => true,
			),
			array(
				'type'        => 'textarea_html',
				'admin_label' => false,
				'heading'     => esc_html__( 'Price Content', 'cleaning_services-core' ),
				'param_name'  => 'content',
				'value'       => '',
			),
			array(
				'type'       => 'param_group',
				'value'      => '',
				'heading'    => esc_html__( 'Service List', 'cleaning_services-core' ),
				'param_name' => 'tabs',
				'params'     => array(
					array(
						'type'        => 'textfield',
						'admin_label' => false,
						'heading'     => esc_html__( 'Title', 'cleaning_services-core' ),
						'param_name'  => 'title',
						'value'       => 'Trained Cleaner',
					),
				),
			),
			array(
				'type'        => 'vc_link',
				'admin_label' => false,
				'heading'     => 'Action Button',
				'param_name'  => 'call_action',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Featured Price', 'cleaning_services-core' ),
				'param_name'  => 'featured',
				'admin_label' => true,
			),
		),
	)
);

class WPBakeryShortCode_Price_Box_Tab_Container extends WPBakeryShortCodesContainer {

}

class WPBakeryShortCode_Price_Box_tab extends WPBakeryShortCodesContainer {

}

class WPBakeryShortCode_Price_Box_tab_Item extends WPBakeryShortCode {

}

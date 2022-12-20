<?php
add_filter( 'rwmb_meta_boxes', 'cleaning_services_register_framework_post_meta_box' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function cleaning_services_register_framework_post_meta_box( $meta_boxes ) {
	global $wp_registered_sidebars;

	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'framework';

	$sidebars = array();

	foreach ( $wp_registered_sidebars as $key => $value ) {
		$sidebars[ $key ] = $value['name'];
	}

	$opacities = array();

	for ( $o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++ ) {
		$opacities[ $n ] = $o;
	}

	// $meta_boxes[] = array(
	// 'id' => 'framework-meta-box-post-format-quote',
	// 'title' => esc_html__('Post Format Data', 'cleaning_services'),
	// 'pages' => array(
	// 'post',
	// ),
	// 'context' => 'normal',
	// 'priority' => 'high',
	// 'tab_style' => 'left',
	// 'fields' => array(
	// array(
	// 'name' => esc_html__('Quote Author', 'cleaning_services'),
	// 'desc' => esc_html__('Insert quote author name.', 'cleaning_services'),
	// 'id' => "{$prefix}-quote-author",
	// 'type' => 'text',
	// ),
	// array(
	// 'name' => esc_html__('Quote Author Url', 'cleaning_services'),
	// 'desc' => esc_html__('Insert author url.', 'cleaning_services'),
	// 'id' => "{$prefix}-quote-author-link",
	// 'type' => 'text',
	// ),
	// array(
	// 'name' => esc_html__('Quote Text', 'cleaning_services'),
	// 'desc' => esc_html__('Insert Quote Text.', 'cleaning_services'),
	// 'id' => "{$prefix}-quote",
	// 'type' => 'textarea',
	// ),
	// ));

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-link',
		'title'     => esc_html__( 'Post Format Data', 'cleaning_services' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Link', 'cleaning_services' ),
				'desc' => esc_html__( 'Works with link post format.', 'cleaning_services' ),
				'id'   => "{$prefix}-link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Link title', 'cleaning_services' ),
				'desc' => esc_html__( 'Works with link post format.', 'cleaning_services' ),
				'id'   => "{$prefix}-link-title",
				'type' => 'text',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-video',
		'title'     => esc_html__( 'Post Format Data', 'cleaning_services' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Video Markup', 'cleaning_services' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'cleaning_services' ),
				'id'   => "{$prefix}-video-markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-audio',
		'title'     => esc_html__( 'Post Format Data', 'cleaning_services' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Audio Markup', 'cleaning_services' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'cleaning_services' ),
				'id'   => "{$prefix}-audio-markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-gallery',
		'title'     => esc_html__( 'Post Format Data', 'cleaning_services' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name'             => esc_html__( 'Upload Gallery Images', 'cleaning_services' ),
				'id'               => "{$prefix}-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 24,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-testimonials',
		'title'     => esc_html__( 'Manage Testimonial Meta Fields', 'cleaning_services' ),
		'pages'     => array(
			'car-testimonial',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Customer Name', 'cleaning_services' ),
				'desc' => esc_html__( 'Customer Name.', 'cleaning_services' ),
				'id'   => "{$prefix}-client-name",
				'type' => 'text',
			),
			array(
				'name'    => esc_html__( 'Customer Ratting', 'cleaning_services' ),
				'desc'    => esc_html__( 'Enter Customer Ratting', 'cleaning_services' ),
				'id'      => "{$prefix}-client-ratting",
				'type'    => 'select',
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				),
			),
			array(
				'id'          => "{$prefix}-ratting_style",
				'name'        => esc_html__( 'Rating Style', 'cleaning_services' ),
				'desc'        => '',
				'type'        => 'image_select',
				'std'         => '',
				'options'     => array(
					'1' => CLEANING_SERVICE_THEME_URI . '/images/admin/light.png',
					'2' => CLEANING_SERVICE_THEME_URI . '/images/admin/dark.png',
				),
				'placeholder' => esc_html__( 'Select', 'cleaning_services' ),
			),
		),
	);

	/*
	$meta_boxes[] = array(
		'id' => 'framework-meta-box-cleaning-services',
		'title' => esc_html__('Manage Cleaning Services Meta Fields', 'cleaning_services'),
		'pages' => array(
			'cleaning_services',
		),
		'context' => 'normal',
		'priority' => 'high',
		'tab_style' => 'left',
		'fields' => array(
			array(
				'name' => esc_html__('Icon', 'cleaning_services'),
				'desc' => esc_html__('Hover Service Icon.', 'cleaning_services'),
				'id' => "{$prefix}-service-icon",
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Page Heading', 'cleaning_services'),
				'desc' => esc_html__('Heading of Page.', 'cleaning_services'),
				'id' => "{$prefix}-service-page-head",
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Sub Title', 'cleaning_services'),
				'desc' => esc_html__('Sub Heading of Page.', 'cleaning_services'),
				'id' => "{$prefix}-service-page-sub-head",
				'type' => 'text',
			),
	));*/

	// Coupons
	$meta_boxes[] = array(
		'id'        => 'cleaning-services-our-coupons',
		'title'     => esc_html__( 'Our Coupons Meta Fields', 'cleaning_services' ),
		'pages'     => array(
			'our_coupons',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Coupon Top Right', 'cleaning_services' ),
				'desc' => esc_html__( 'Coupon Top Right', 'cleaning_services' ),
				'id'   => "{$prefix}-coupon-top-right",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Middle', 'cleaning_services' ),
				'desc' => esc_html__( 'Coupon Middle', 'cleaning_services' ),
				'id'   => "{$prefix}-coupon-middle",
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Coupon Title', 'cleaning_services' ),
				'desc' => esc_html__( 'Coupon Title', 'cleaning_services' ),
				'id'   => "{$prefix}-coupon-title",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Ribbon', 'cleaning_services' ),
				'desc' => esc_html__( 'Coupon Ribbon', 'cleaning_services' ),
				'id'   => "{$prefix}-coupon-ribbon",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Date', 'cleaning_services' ),
				'desc' => esc_html__( 'Coupon Date', 'cleaning_services' ),
				'id'   => "{$prefix}-coupon-date",
				'type' => 'text',
			),
			array(
				'name'             => esc_html__( 'Logo Image', 'cleaning_services' ),
				'id'               => "{$prefix}-logo",
				'desc'             => '',
				'type'             => 'image',
				'max_file_uploads' => 1,
			),
		),
	);

	$posts_page = get_option( 'page_for_posts' );

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-thumbsize',
		'title'     => esc_html__( 'Select Thumbnail size for gallery', 'cleaning_services' ),
		'pages'     => array(
			'projects',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Amount', 'cleaning_services' ),
				'id'   => "{$prefix}-amount",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Time duration ( Day or weeks or month )', 'cleaning_services' ),
				'id'   => "{$prefix}-timeduration",
				'type' => 'text',
			),
			array(
				'name'    => esc_html__( 'Select Thumbanail size', 'cleaning_services' ),
				'id'      => "{$prefix}-thumbnail-size",
				'type'    => 'select',
				'options' => array(
					''           => 'Default',
					'sm_squier'  => 'Small Squier',
					'big_squier' => 'Big Squier',
					'single_hor' => 'Single Horizontal',
					'single_var' => 'Single Vertical',
				),
			),
		),
	);

	$posts_page = get_option( 'page_for_posts' );

	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {

		$meta_boxes[] = array(
			'id'       => $prefix . '_page_meta_box',
			'title'    => esc_html__( 'Page Design Settings', 'cleaning_services' ),
			'pages'    => array(
				'page',
				'cleaning_services',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_show_page_title",
					'name'    => esc_html__( 'Show page titlebar', 'cleaning_services' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'Show Breadcrumb', 'cleaning_services' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
			),
		);
	}

	return $meta_boxes;
}

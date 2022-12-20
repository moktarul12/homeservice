<?php
// Register Custom Post Type
function cleaning_services_coupons_post_type() {
		global $cleaning_services_opt;
	if ( isset( $cleaning_services_opt['cleaning_services-custom_post_type_off'] ) && $cleaning_services_opt['cleaning_services-custom_post_type_off'] != 1 ) {

		$labels = array(
			'name'                  => _x( 'Coupons', 'Post Type General Name', 'cleaning_services' ),
			'singular_name'         => _x( 'Coupon', 'Post Type Singular Name', 'cleaning_services' ),
			'menu_name'             => __( 'Coupons', 'cleaning_services' ),
			'name_admin_bar'        => __( 'Coupon', 'cleaning_services' ),
			'archives'              => __( 'Item Archives', 'cleaning_services' ),
			'parent_item_colon'     => __( 'Parent Item:', 'cleaning_services' ),
			'all_items'             => __( 'All Coupons', 'cleaning_services' ),
			'add_new_item'          => __( 'Add New Coupon', 'cleaning_services' ),
			'add_new'               => __( 'Add New Coupon', 'cleaning_services' ),
			'new_item'              => __( 'New Service Item', 'cleaning_services' ),
			'edit_item'             => __( 'Edit Coupon Item', 'cleaning_services' ),
			'update_item'           => __( 'Update Coupon Item', 'cleaning_services' ),
			'view_item'             => __( 'View Coupon Item', 'cleaning_services' ),
			'search_items'          => __( 'Search Item', 'cleaning_services' ),
			'not_found'             => __( 'Not found', 'cleaning_services' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cleaning_services' ),
			'featured_image'        => __( 'Featured Image', 'cleaning_services' ),
			'set_featured_image'    => __( 'Set featured image', 'cleaning_services' ),
			'remove_featured_image' => __( 'Remove featured image', 'cleaning_services' ),
			'use_featured_image'    => __( 'Use as featured image', 'cleaning_services' ),
			'insert_into_item'      => __( 'Insert into item', 'cleaning_services' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cleaning_services' ),
			'items_list'            => __( 'Items list', 'cleaning_services' ),
			'items_list_navigation' => __( 'Items list navigation', 'cleaning_services' ),
			'filter_items_list'     => __( 'Filter items list', 'cleaning_services' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'cleaning_services' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'our_coupons' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
		);

		register_post_type( 'our_coupons', $args );
	}
}

add_action( 'init', 'cleaning_services_coupons_post_type', 0 );


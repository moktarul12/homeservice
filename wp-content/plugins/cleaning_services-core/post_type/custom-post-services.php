<?php
// Register Custom Post Type
function cleaning_services_services_post_type() {

	$postype_name_cleaning_services = 'cleaning_services';

	if ( function_exists( 'cleaning_services_options' ) ) {
		$cleaning_services = cleaning_services_options();
		if ( isset( $cleaning_services['cleaning_services-postype_name_cleaning_services'] ) && ! empty( $cleaning_services['cleaning_services-postype_name_cleaning_services'] ) ) {
				$postype_name_cleaning_services = $cleaning_services['cleaning_services-postype_name_cleaning_services'];
		}
	}

	$labels = array(
		'name'                  => _x( $postype_name_cleaning_services, 'Post Type General Name', 'cleaning_services' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'cleaning_services' ),
		'menu_name'             => __( 'Services', 'cleaning_services' ),
		'name_admin_bar'        => __( 'Service', 'cleaning_services' ),
		'archives'              => __( 'Item Archives', 'cleaning_services' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cleaning_services' ),
		'all_items'             => __( 'All Services', 'cleaning_services' ),
		'add_new_item'          => __( 'Add New Service', 'cleaning_services' ),
		'add_new'               => __( 'Add New Service', 'cleaning_services' ),
		'new_item'              => __( 'New Service Item', 'cleaning_services' ),
		'edit_item'             => __( 'Edit Service Item', 'cleaning_services' ),
		'update_item'           => __( 'Update Service Item', 'cleaning_services' ),
		'view_item'             => __( 'View Service Item', 'cleaning_services' ),
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

	$slug_postype_cleaning_services = 'cleaning_services';

	if ( function_exists( 'cleaning_services_options' ) ) {
		$cleaning_services = cleaning_services_options();
		if ( isset( $cleaning_services['cleaning_services-slug_postype_cleaning_services'] ) && ! empty( $cleaning_services['cleaning_services-slug_postype_cleaning_services'] ) ) {
				$slug_postype_cleaning_services = $cleaning_services['cleaning_services-slug_postype_cleaning_services'];
		}
	}

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'cleaning_services' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug_postype_cleaning_services ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'cleaning_services', $args );
}

add_action( 'init', 'cleaning_services_services_post_type', 0 );

<?php
add_action( 'init', 'register_clening_services_gallery_postype' );

function register_clening_services_gallery_postype() {

	global $cleaning_services_opt;
	if ( isset( $cleaning_services_opt['cleaning_services-custom_post_type_off'] ) && $cleaning_services_opt['cleaning_services-custom_post_type_off'] != 1 ) {

		$labels = array(
			'name'               => __( 'Gallery', 'cleaning_services' ),
			'singular_name'      => __( 'Gallery', 'cleaning_services' ),
			'add_new'            => __( 'Add New', 'cleaning_services' ),
			'add_new_item'       => __( 'Add New Gallery', 'cleaning_services' ),
			'edit_item'          => __( 'Edit Gallery', 'cleaning_services' ),
			'new_item'           => __( 'New Gallery', 'cleaning_services' ),
			'view_item'          => __( 'View Gallery', 'cleaning_services' ),
			'search_items'       => __( 'Search Gallery', 'cleaning_services' ),
			'not_found'          => __( 'No Gallery found', 'cleaning_services' ),
			'not_found_in_trash' => __( 'No Gallery found in Trash', 'cleaning_services' ),
			'parent_item_colon'  => '',
		);

		$slug_postype_cleaning_gallery = 'gallery';

		if ( function_exists( 'cleaning_services_options' ) ) {
			$cleaning_services = cleaning_services_options();
			if ( isset( $cleaning_services['cleaning_services-slug_postype_cleaning_gallery'] ) && ! empty( $cleaning_services['cleaning_services-slug_postype_cleaning_gallery'] ) ) {
				$slug_postype_cleaning_gallery = $cleaning_services['cleaning_services-slug_postype_cleaning_gallery'];
			}
		}

		register_post_type(
			'gallery',
			array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'query_var'          => true,
				'rewrite'            => true,
				'capability_type'    => 'post',
				'hierarchical'       => false,
				'menu_position'      => 10,
				'supports'           => array( 'title', 'editor', 'thumbnail' ),
				'rewrite'            => array( 'slug' => $slug_postype_cleaning_gallery ),
			)
		);

		$labels = array(
			'name'              => _x( 'Gallery Categories', 'portfolio categories', 'cleaning_services' ),
			'singular_name'     => _x( 'Gallery Category', 'portfolio category', 'cleaning_services' ),
			'search_items'      => __( 'Search Gallery Categories', 'cleaning_services' ),
			'all_items'         => __( 'All Gallery Categories', 'cleaning_services' ),
			'parent_item'       => __( 'Parent Gallery Category', 'cleaning_services' ),
			'parent_item_colon' => __( 'Parent Gallery Category:', 'cleaning_services' ),
			'edit_item'         => __( 'Edit Gallery Category', 'cleaning_services' ),
			'update_item'       => __( 'Update Gallery Category', 'cleaning_services' ),
			'add_new_item'      => __( 'Add New Gallery Category', 'cleaning_services' ),
			'new_item_name'     => __( 'New Gallery Category Name', 'cleaning_services' ),
			'menu_name'         => __( 'Gallery Category', 'cleaning_services' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'gallery-cat' ),
		);

		register_taxonomy( 'gallery-cat', array( 'gallery' ), $args );

	}
}

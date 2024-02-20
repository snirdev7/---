<?php
/* CPT recipe */
add_action( 'init', 'recipe_cpt' );
function recipe_cpt() {
	$labels = [
		'name'               => __( 'recipe', 'live' ),
		'singular_name'      => __( 'recipe', 'live' ),
		'add_new'            => __( 'Add recipe', 'live' ),
		'add_new_item'       => __( 'Add recipe', 'live' ),
		'edit_item'          => __( 'Edit recipe Item', 'live' ),
		'new_item'           => __( 'New recipe Item', 'live' ),
		'view_item'          => __( 'View recipe Item', 'live' ),
		'search_items'       => __( 'Search recipe Item', 'live' ),
		'not_found'          => __( 'No recipe Item found', 'live' ),
		'not_found_in_trash' => __( 'No recipe Item found in Trash', 'live' ),
		'parent_item_colon'  => __( 'Parent recipe Item:', 'live' ),
		'menu_name'          => __( 'Recipes', 'live' ),
	];
	$args = [
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => [ 'post_tag' ],
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite' 			  => array('slug' => __( 'recipes', 'live' ), 'with_front' => false),
		'menu_icon'           => 'dashicons-food',
		'capability_type'     => 'post',
		'supports'            => [ 'title', 'thumbnail'],
	];
	register_post_type( 'recipe', $args );
}

add_action( 'init', 'recipe_taxonomy_register', 0 );
function recipe_taxonomy_register() {

	$labels = [
		'name'                       => __( 'recipe category', 'live' ),
		'singular_name'              => __( 'recipe category', 'live' ),
		'menu_name'                  => __( 'recipe category', 'live' ),
		'all_items'                  => __( 'All recipes categories', 'live' ),
		'parent_item'                => __( 'Parent recipes categories', 'live' ),
		'parent_item_colon'          => __( 'Parent recipes categories:', 'live' ),
		'new_item_name'              => __( 'New recipes category', 'live' ),
		'add_new_item'               => __( 'Add New recipes category', 'live' ),
		'edit_item'                  => __( 'Edit recipes category', 'live' ),
		'update_item'                => __( 'Update recipes category', 'live' ),
		'view_item'                  => __( 'View recipes category', 'live' ),
		'separate_items_with_commas' => __( 'Separate items with commas',
			'live' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'live' ),
		'choose_from_most_used'      => __( 'Choose from the most used',
			'live' ),
		'popular_items'              => __( 'Popular Items', 'live' ),
		'search_items'               => __( 'Search Items', 'live' ),
		'not_found'                  => __( 'Not Found', 'live' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		//'rewrite'           => [ 'slug' => __( 'recipe', 'live' ), 'with_front' => false ],
	];
	register_taxonomy( 'recipe-category', 'recipe', $args );
}

/* CPT product */
add_action( 'init', 'product_cpt' );
function product_cpt() {
	$labels = [
		'name'               => __( 'product', 'live' ),
		'singular_name'      => __( 'product', 'live' ),
		'add_new'            => __( 'Add product', 'live' ),
		'add_new_item'       => __( 'Add product', 'live' ),
		'edit_item'          => __( 'Edit product Item', 'live' ),
		'new_item'           => __( 'New product Item', 'live' ),
		'view_item'          => __( 'View product Item', 'live' ),
		'search_items'       => __( 'Search product Item', 'live' ),
		'not_found'          => __( 'No product Item found', 'live' ),
		'not_found_in_trash' => __( 'No product Item found in Trash', 'live' ),
		'parent_item_colon'  => __( 'Parent product Item:', 'live' ),
		'menu_name'          => __( 'products', 'live' ),
	];
	$args = [
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => [ 'post_tag' ],
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite' 			  => array('slug' => __( 'products', 'live' ) . '/' . __( 'product', 'live' ), 'with_front' => false),
		'menu_icon'           => 'dashicons-products',
		'capability_type'     => 'post',
		'supports'            => [ 'title', 'thumbnail'],
	];
	register_post_type( 'product', $args );
}

add_action( 'init', 'product_taxonomy_register', 0 );
function product_taxonomy_register() {

	$labels = [
		'name'                       => __( 'product category', 'live' ),
		'singular_name'              => __( 'product category', 'live' ),
		'menu_name'                  => __( 'product category', 'live' ),
		'all_items'                  => __( 'All products categories', 'live' ),
		'parent_item'                => __( 'Parent products categories', 'live' ),
		'parent_item_colon'          => __( 'Parent products categories:', 'live' ),
		'new_item_name'              => __( 'New products category', 'live' ),
		'add_new_item'               => __( 'Add New products category', 'live' ),
		'edit_item'                  => __( 'Edit products category', 'live' ),
		'update_item'                => __( 'Update products category', 'live' ),
		'view_item'                  => __( 'View products category', 'live' ),
		'separate_items_with_commas' => __( 'Separate items with commas',
			'live' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'live' ),
		'choose_from_most_used'      => __( 'Choose from the most used',
			'live' ),
		'popular_items'              => __( 'Popular Items', 'live' ),
		'search_items'               => __( 'Search Items', 'live' ),
		'not_found'                  => __( 'Not Found', 'live' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => array( 'slug' => __( 'products', 'live' ), 'with_front' => false ),
		// 'rewrite'           => [ 'slug' => __( 'products', 'live' ), 'with_front' => false ],
	];
	register_taxonomy( 'product-category', 'product', $args );
}
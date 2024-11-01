<?php
/*
* Creating a function to create our CPT
*/

// Register Custom Post Type Portfolio
function custom_post_type_portfolio()
{

	$labels = array(
		'name'                  => _x('Portfolios', 'Post Type General Name', 'spec-theme-options'),
		'singular_name'         => _x('Portfolio', 'Post Type Singular Name', 'spec-theme-options'),
		'menu_name'             => __('Portfolios', 'spec-theme-options'),
		'name_admin_bar'        => __('Portfolio', 'spec-theme-options'),
		'archives'              => __('Item Archives', 'spec-theme-options'),
		'attributes'            => __('Item Attributes', 'spec-theme-options'),
		'parent_item_colon'     => __('Parent Item:', 'spec-theme-options'),
		'all_items'             => __('All Items', 'spec-theme-options'),
		'add_new_item'          => __('Add New Item', 'spec-theme-options'),
		'add_new'               => __('Add New', 'spec-theme-options'),
		'new_item'              => __('New Item', 'spec-theme-options'),
		'edit_item'             => __('Edit Item', 'spec-theme-options'),
		'update_item'           => __('Update Item', 'spec-theme-options'),
		'view_item'             => __('View Item', 'spec-theme-options'),
		'view_items'            => __('View Items', 'spec-theme-options'),
		'search_items'          => __('Search Item', 'spec-theme-options'),
		'not_found'             => __('Not found', 'spec-theme-options'),
		'not_found_in_trash'    => __('Not found in Trash', 'spec-theme-options'),
		'featured_image'        => __('Featured Image', 'spec-theme-options'),
		'set_featured_image'    => __('Set featured image', 'spec-theme-options'),
		'remove_featured_image' => __('Remove featured image', 'spec-theme-options'),
		'use_featured_image'    => __('Use as featured image', 'spec-theme-options'),
		'insert_into_item'      => __('Insert into item', 'spec-theme-options'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'spec-theme-options'),
		'items_list'            => __('Items list', 'spec-theme-options'),
		'items_list_navigation' => __('Items list navigation', 'spec-theme-options'),
		'filter_items_list'     => __('Filter items list', 'spec-theme-options'),
	);
	$args = array(
		'label'                 => __('Portfolio', 'spec-theme-options'),
		'description'           => __('Post Type Portfolio', 'spec-theme-options'),
		'labels'                => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_nav_menus'  => true,
		'menu_icon'          => 'dashicons-portfolio',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'portfolio',
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		// 'show_in_rest' => true,

		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
	);
	register_post_type('portfolio', $args);
}
add_action('init', 'custom_post_type_portfolio', 0);

// Register Custom Taxonomy for portfolio
/**
 * Register the "Portfolio Categories" custom post type.
 */

function portfolio_taxonomy()
{

	$labels = array(
		'name'                       => _x('Portfolio Categories', 'Taxonomy General Name', 'spec-theme-options'),
		'singular_name'              => _x('Portfolio Category', 'Taxonomy Singular Name', 'spec-theme-options'),
		'menu_name'                  => __('Portfolio Category', 'spec-theme-options'),
		'all_items'                  => __('All Items', 'spec-theme-options'),
		'parent_item'                => __('Parent Item', 'spec-theme-options'),
		'parent_item_colon'          => __('Parent Item:', 'spec-theme-options'),
		'new_item_name'              => __('New Item Name', 'spec-theme-options'),
		'add_new_item'               => __('Add New Item', 'spec-theme-options'),
		'edit_item'                  => __('Edit Item', 'spec-theme-options'),
		'update_item'                => __('Update Item', 'spec-theme-options'),
		'view_item'                  => __('View Item', 'spec-theme-options'),
		'separate_items_with_commas' => __('Separate items with commas', 'spec-theme-options'),
		'add_or_remove_items'        => __('Add or remove items', 'spec-theme-options'),
		'choose_from_most_used'      => __('Choose from the most used', 'spec-theme-options'),
		'popular_items'              => __('Popular Items', 'spec-theme-options'),
		'search_items'               => __('Search Items', 'spec-theme-options'),
		'not_found'                  => __('Not Found', 'spec-theme-options'),
		'no_terms'                   => __('No items', 'spec-theme-options'),
		'items_list'                 => __('Items list', 'spec-theme-options'),
		'items_list_navigation'      => __('Items list navigation', 'spec-theme-options'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy('portfolio-category', array('portfolio'), $args);
}
add_action('init', 'portfolio_taxonomy', 0);

// Register Custom Post Type Testimonials
function custom_post_type_testimonial()
{

	$labels = array(
		'name'                  => _x('Testimonial', 'Post Type General Name', 'spec-theme-options'),
		'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'spec-theme-options'),
		'menu_name'             => __('Testimonials', 'spec-theme-options'),
		'name_admin_bar'        => __('Testimonial', 'spec-theme-options'),
		'archives'              => __('Item Archives', 'spec-theme-options'),
		'attributes'            => __('Item Attributes', 'spec-theme-options'),
		'parent_item_colon'     => __('Parent Item:', 'spec-theme-options'),
		'all_items'             => __('All Items', 'spec-theme-options'),
		'add_new_item'          => __('Add New Item', 'spec-theme-options'),
		'add_new'               => __('Add New', 'spec-theme-options'),
		'new_item'              => __('New Item', 'spec-theme-options'),
		'edit_item'             => __('Edit Item', 'spec-theme-options'),
		'update_item'           => __('Update Item', 'spec-theme-options'),
		'view_item'             => __('View Item', 'spec-theme-options'),
		'view_items'            => __('View Items', 'spec-theme-options'),
		'search_items'          => __('Search Item', 'spec-theme-options'),
		'not_found'             => __('Not found', 'spec-theme-options'),
		'not_found_in_trash'    => __('Not found in Trash', 'spec-theme-options'),
		'featured_image'        => __('Featured Image', 'spec-theme-options'),
		'set_featured_image'    => __('Set featured image', 'spec-theme-options'),
		'remove_featured_image' => __('Remove featured image', 'spec-theme-options'),
		'use_featured_image'    => __('Use as featured image', 'spec-theme-options'),
		'insert_into_item'      => __('Insert into item', 'spec-theme-options'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'spec-theme-options'),
		'items_list'            => __('Items list', 'spec-theme-options'),
		'items_list_navigation' => __('Items list navigation', 'spec-theme-options'),
		'filter_items_list'     => __('Filter items list', 'spec-theme-options'),
	);
	$args = array(
		'label'                 => __('testimonial', 'spec-theme-options'),
		'description'           => __('Post Type Testimonial', 'spec-theme-options'),
		'labels'                => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-groups',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'testimonial',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
	);
	register_post_type('testimonial', $args);
}
add_action('init', 'custom_post_type_testimonial', 0);

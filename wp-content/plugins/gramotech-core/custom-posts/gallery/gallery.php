<?php
/*
Plugin Name: GramoTech Gallery
Plugin URI: 
Description: A Custom Post Type Plugin To Use With GramoTech Themes ( This plugin functionality might not working properly on another theme )
Version: 1.0.0
Author: GramoTech
Author URI: http://www.gramotech.com
License: 
*/

// add action to create gallery post type
add_action( 'init', 'gramotech_create_gallery' );
if( !function_exists('gramotech_create_gallery') ){
	function gramotech_create_gallery() {
				
		$gallery_slug = 'gallery';
		$gallery_category_slug = 'gallery_category';
		$gallery_tag_slug = 'gallery_tag';		
		
		register_post_type( 'gallery',
			array(
				'labels' => array(
					'name'               => esc_attr__('Gallery', 'edugrade'),
					'singular_name'      => esc_attr__('Gallery', 'edugrade'),
					'add_new'            => esc_attr__('Add New', 'edugrade'),
					'add_new_item'       => esc_attr__('Add New Gallery', 'edugrade'),
					'edit_item'          => esc_attr__('Edit Gallery', 'edugrade'),
					'new_item'           => esc_attr__('New Gallery', 'edugrade'),
					'all_items'          => esc_attr__('All Gallery', 'edugrade'),
					'view_item'          => esc_attr__('View Gallery', 'edugrade'),
					'search_items'       => esc_attr__('Search Gallery', 'edugrade'),
					'not_found'          => esc_attr__('No Gallery found', 'edugrade'),
					'not_found_in_trash' => esc_attr__('No Gallery found in Trash', 'edugrade'),
					'parent_item_colon'  => '',
					'menu_name'          => esc_attr__('Gallery', 'edugrade')
				),
				'public'             => true,
				'publicly_queryable' => false,
				'rewrite' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,				
				'rewrite'            => array( 'slug' => $gallery_slug  ),
				'capability_type'    => 'post',
				'menu_icon'    		=> 'dashicons-format-gallery',
				'has_archive'        => false,
				'hierarchical'       => true,
				'menu_position'      => 5,
				'supports'           => array( 'title', 'thumbnail')
			)
		);
		
		// create gallery categories
		register_taxonomy(
			'gallery_category', array("gallery"), array(
				'hierarchical' => true,
				'show_admin_column' => true,
				'label' => esc_attr__('Gallery Categories', 'edugrade'), 
				'singular_label' => esc_attr__('Gallery Category', 'edugrade'), 
				'rewrite' => array( 'slug' => $gallery_category_slug  )
			)
		);
	}
}
?>
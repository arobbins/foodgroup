<?php

/*
  Plugin Name: Food Group Custom Post Types
  Version: 1.0
  Author: Andrew Robbins - https://simpleblend.net
  Description: Custom Post Types for Food Group
*/

/*
  CPT: Partners
*/
function custom_post_type_partners() {

  $labels = array(
    'name'                => _x('Partners', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Partner', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Partners', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Partner', 'text_domain'),
    'edit_item'           => __('Edit Partner', 'text_domain'),
    'not_found'           => __('No Partner found', 'text_domain'),
    'not_found_in_trash'  => __('No Partner found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('partners', 'text_domain'),
    'description'         => __('Custom Post Type for Partners', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-businessman',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'rewrite'             => array( 'slug' => '/partner')
  );

  register_post_type('partners', $args);

}


/*
  CPT: Staff
*/
function custom_post_type_staff() {

  $labels = array(
    'name'                => _x('Staff', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Staff', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Staff', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Staff', 'text_domain'),
    'edit_item'           => __('Edit Staff', 'text_domain'),
    'not_found'           => __('No Staff found', 'text_domain'),
    'not_found_in_trash'  => __('No Staff found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('staff', 'text_domain'),
    'description'         => __('Custom Post Type for Staff', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'rewrite'             => array( 'slug' => '/staff')
  );

  register_post_type('staff', $args);

}


/*
  CPT: Publications
*/
function custom_post_type_publications() {

  $labels = array(
    'name'                => _x('Publications', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Publication', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Publications', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Publication', 'text_domain'),
    'edit_item'           => __('Edit Publication', 'text_domain'),
    'not_found'           => __('No Publication found', 'text_domain'),
    'not_found_in_trash'  => __('No Publication found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('publications', 'text_domain'),
    'description'         => __('Custom Post Type for Publications', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-book',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'rewrite'             => array( 'slug' => '/publication')
  );

  register_post_type('publications', $args);

}


/*
  CPT: Publications
*/
function custom_post_type_recipes() {

  $labels = array(
    'name'                => _x('Recipes', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Recipe', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Recipes', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'new_item'            => __('Add New Recipe', 'text_domain'),
    'edit_item'           => __('Edit Recipe', 'text_domain'),
    'not_found'           => __('No Recipe found', 'text_domain'),
    'not_found_in_trash'  => __('No Recipe found in trash', 'text_domain')
  );

  $args = array(
    'label'               => __('recipes', 'text_domain'),
    'description'         => __('Custom Post Type for Recipes', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title'),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 100,
    'menu_icon'           => 'dashicons-carrot',
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'rewrite'             => array( 'slug' => '/recipe')
  );

  register_post_type('recipes', $args);

}


// Hookin, yo
add_action('init', 'custom_post_type_partners', 0);
add_action('init', 'custom_post_type_staff', 0);
add_action('init', 'custom_post_type_publications', 0);
add_action('init', 'custom_post_type_recipes', 0);


?>
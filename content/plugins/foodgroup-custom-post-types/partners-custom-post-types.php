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
    'menu_icon'           => 'dashicons-location',
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


// Hookin, yo
add_action('init', 'custom_post_type_partners', 0);

?>
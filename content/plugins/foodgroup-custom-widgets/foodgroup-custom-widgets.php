<?php

/*
  Plugin Name: Food Group Custom Widgets
  Version: 1.0
  Author: Andrew Robbins - http://simpleblend.net
  Description: Food Group Widgets
*/


//
// Contact Widget
//
class ContactWidget extends WP_Widget {

  function ContactWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Contact Widget');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/contact/contact.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/contact/contact-fields.php');
  }
}

function wp_contact_widget() {
  register_widget('ContactWidget');
}

add_action('widgets_init', 'wp_contact_widget');


//
// Newsletter Widget
//
class NewsletterWidget extends WP_Widget {

  function NewsletterWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Newsletter Widget');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/newsletter/newsletter.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/newsletter/newsletter-fields.php');
  }
}

function wp_newsletter_widget() {
  register_widget('NewsletterWidget');
}

add_action('widgets_init', 'wp_newsletter_widget');



//
// Subnav Widget
//
class SubnavWidget extends WP_Widget {

  function SubnavWidget() {
    // Instantiate the parent object
    parent::__construct(false, 'Subnav Widget');
  }

  function widget($args, $instance) {
    // Widget output
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);

    require('widgets/subnav/subnav.php');
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form($instance) {
    // Output admin widget options form
    $title = esc_attr($instance['title']);

    require('widgets/subnav/subnav-fields.php');
  }
}

function wp_subnav_widget() {
  register_widget('SubnavWidget');
}

add_action('widgets_init', 'wp_subnav_widget');

?>
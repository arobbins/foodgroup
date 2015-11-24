<?php

  function child_do_layout($opt) {
    $opt = 'full-width-content';
    return $opt;
  }

  add_filter('genesis_pre_get_option_site_layout', 'child_do_layout');


  function add_genesis_entry_content() {

    $title = sprintf('<div class="entry-content"><h1 class="entry-title">%s %s</h1></div>', apply_filters( 'genesis_search_title_text', __('Search Results for:', 'genesis')), get_search_query());

    echo apply_filters( 'genesis_search_title_output', $title ) . "\n";
  }

  add_action('genesis_before_content', 'add_genesis_entry_content');


  function add_search_form() {

    echo "<h2>Search again</h2>";
    echo get_search_form();

  }

  add_action('genesis_after_loop', 'add_search_form');


  genesis();
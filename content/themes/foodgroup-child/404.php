<?php

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'genesis_404' );

add_filter( 'genesis_pre_get_option_site_layout', 'child_do_layout' );

function child_do_layout($opt) {
  $opt = 'full-width-content';
  return $opt;
}

function genesis_404() {

  echo '<article class="page type-page status-publish entry">
    <header class="entry-header">
      <h1 class="entry-title" itemprop="headline">Page not found</h1>
    </header>

    <div class="entry-content" itemprop="text">
      <p>The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="/">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.</p>
    </div>

  </article>';

  get_search_form();

}

genesis();
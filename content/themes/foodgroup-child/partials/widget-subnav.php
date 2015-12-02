<?php

  global $post;

  $parentTitle = get_the_title($post->post_parent);

  if(is_page() && $post->post_parent ) {

    $pages = getPageChildren($post->post_parent);

  } else {

    $page_id  = get_queried_object_id();
    $pages = getPageChildren($page_id);

  }

  if(!empty($pages)) {

    echo '<section class="widget widget-subnav">';
    echo '<h3>' . $parentTitle . '</h3>';
    echo '<ul class="widget-subnav-list">';

    foreach($pages as $page) {
      $pageId = $page->ID;
      echo '<li class="widget-subnav-list-item"><a href="' . get_the_permalink($pageId) . '" class="widget-subnav-list-item-link">' . get_the_title($pageId) . '</a></li>';
    }

    echo '</ul>';
    echo '</section>';

  }

?>
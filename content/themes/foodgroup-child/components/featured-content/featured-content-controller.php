<?php

  //
  // News
  //
  $newsArgs = array(
    'cat' => 36,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2
  );
  $newsQuery = new WP_Query($newsArgs);

  //
  // Client Story
  //
  $clientStoryArgs = array(
    'cat' => 37,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1
  );
  $clientStoryQuery = new WP_Query($clientStoryArgs);

  //
  // Supporter Spotlight
  //
  $supporterSpotlightArgs = array(
    'cat' => 38,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1
  );
  $supporterSpotlightQuery = new WP_Query($supporterSpotlightArgs);

?>
<?php

  include('featured-content-controller.php');

?>

<section class="component component-featured-content">
  <div class="wrap l-flex">

    <section class="featured-content recent-news">
      <h2 class="featured-content-heading"><i class="fa fa-newspaper-o"></i> Recent News</h2>
      <div class="featured-content-wrapper">
        <?php
          if($newsQuery->have_posts()) {
            while ($newsQuery->have_posts()) : $newsQuery->the_post(); ?>
            <div class="recent-news-item">
              <h3 class="recent-news-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
              <span class="recent-date"><?php the_date(); ?></span>
              <div class="recent-news-excerpt"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="btn btn-secondary recent-news-link">Read more</a>
            </div>
             <?php
            endwhile;
          }
          wp_reset_query();
        ?>
      </div>
    </section>

    <section class="featured-content client-story">
      <h2 class="featured-content-heading"><i class="fa fa-comment-o"></i> Client Story</h2>
      <div class="featured-content-wrapper">
        <?php
          if($clientStoryQuery->have_posts()) {
            while ($clientStoryQuery->have_posts()) : $clientStoryQuery->the_post(); ?>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
              </a>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read more</a>
             <?php
            endwhile;
          }
          wp_reset_query();
        ?>
      </div>
    </section>

    <section class="featured-content supporter-spotlight">
      <h2 class="featured-content-heading"><i class="fa fa-bullhorn"></i> Supporter Spotlight</h2>
      <div class="featured-content-wrapper">
        <?php
          if($supporterSpotlightQuery->have_posts()) {
            while ($supporterSpotlightQuery->have_posts()) : $supporterSpotlightQuery->the_post(); ?>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
              </a>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read more</a>
             <?php
            endwhile;
          }
          wp_reset_query();
        ?>
      </div>
    </section>

  </div>
</section>
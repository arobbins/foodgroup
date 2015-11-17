<section class="publications">
  <?php

    $my_posts = new WP_Query(array(
      'post_type' => 'publications',
      'showposts' => -1
    ));

    $publications = [];

    if($my_posts->have_posts()) :

      while($my_posts->have_posts()) :

        $my_posts->the_post();

        $pubCategory = get_field('publication_category');

        if(array_key_exists($pubCategory, $publications)) {
          array_push($publications[$pubCategory], get_the_id());

        } else {
          $publications[$pubCategory][] = get_the_id();

        }

      endwhile;

      wp_reset_postdata();

    endif;

  ?>

</section>

<?php foreach($publications as $key => $value) { ?>
  <section class="publication-category">
    <h2 class="publication-category-title"><?php echo ucwords($key); ?></h2>
    <ul class="publication-list">
      <?php foreach ($value as $id) { ?>
        <li class="publication-list-item">
          <a href="<?php the_field('publication_file', $id); ?>" class="publication-link">
            <span class="publication-title"><?php the_field('publication_title', $id); ?></span>
          </a>
          <i class="fa fa-file-pdf-o"></i>
        </li>
      <?php } ?>
    </ul>
  </section>
<?php } ?>
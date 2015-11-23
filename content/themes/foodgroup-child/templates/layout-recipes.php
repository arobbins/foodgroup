<section class="recipes">
  <?php

    $my_posts = new WP_Query(array(
      'post_type' => 'recipes',
      'showposts' => -1
    ));

    $recipes = [];

    if($my_posts->have_posts()) :

      while($my_posts->have_posts()) :

        $my_posts->the_post();

        $recipeCategory = get_field('recipe_category');
        $recipeCategoryImage = get_field('recipe_category_image');

        if(array_key_exists($recipeCategory, $recipes)) {
          $recipes[$recipeCategory]['recipes'][] = get_the_id();

        } else {
          $recipes[$recipeCategory]['recipes'][] = get_the_id();
          $recipes[$recipeCategory]['image'] = $recipeCategoryImage;

        }

      endwhile;

      wp_reset_postdata();

    endif;

    // Sorting alphabetically
    ksort($recipes);

  ?>

<?php foreach($recipes as $key => $value) { ?>

  <section class="recipe-category">

    <img src="<?php echo $value['image']; ?>" alt="<?php echo ucwords($key); ?> Category">

    <h2 class="recipe-category-title"><?php echo ucwords($key); ?></h2>
    <ul class="recipe-list">
      <?php foreach ($value['recipes'] as $id) { ?>
        <li class="recipe-list-item">

          <?php if(get_field('recipe_new', $id)) { ?>
            <span class="recipe-new">New!</span>
          <?php } ?>

          <a href="<?php the_field('recipe_file', $id); ?>" class="recipe-link">
            <span class="recipe-title"><?php the_field('recipe_title', $id); ?></span>
          </a>
          <i class="fa fa-file-pdf-o"></i>

        </li>
      <?php } ?>
    </ul>
  </section>

<?php } ?>

</section>
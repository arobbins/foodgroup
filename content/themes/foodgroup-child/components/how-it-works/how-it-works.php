<section class="component component-how-it-works">
  <div class="wrap">
    <h1 class="how-it-works-heading"><?php the_sub_field('component_how_it_works_heading'); ?></h1>
    <ul class="how-it-works-steps">
    <?php
      if(have_rows('component_how_it_works_steps')):
        while (have_rows('component_how_it_works_steps')) : the_row(); ?>
        <li class="how-it-works-step">
          <a href="<?php the_sub_field('component_how_it_works_step_link'); ?>" class="how-it-works-link">
            <i class="how-it-works-icon icon-<?php the_sub_field('component_how_it_works_step_icon'); ?>"></i>
          </a>
          <div class="how-it-works-title"> <?php the_sub_field('component_how_it_works_step_heading'); ?></div>
          <div class="how-it-works-description"><?php the_sub_field('component_how_it_works_step_description'); ?></div>
          <img src="<?php the_sub_field('component_how_it_works_step_divider'); ?>" alt="How it works step divider" class="how-it-works-divider">
        </li>
        <?php endwhile;
      else :

      endif;
    ?>
    </ul>
  </div>
</section>
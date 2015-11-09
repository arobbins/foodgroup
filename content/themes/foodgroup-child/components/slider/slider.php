<?php
  // echo 'yo';
?>
<section class="component component-slider">

  <?php
    if(have_rows('slider_slides')):
      while (have_rows('slider_slides')) : the_row(); ?>
        <div class="slide-wrapper" style="background-image: url(<?php the_sub_field('slide_image'); ?>);">

        <?php if(get_sub_field('slide_has_content')) { ?>
          <div class="slide-content">
            <h1 class="slide-heading">
              <?php the_sub_field('slide_heading'); ?>
            </h1>
            <div class="slide-copy">
              <?php the_sub_field('slide_copy'); ?>
            </div>
            <a href="<?php the_sub_field('slide_button_link'); ?>" class="btn btn-slide">
              <?php the_sub_field('slide_button_copy'); ?>
            </a>
          </div>
        </div>
        <?php } ?>

      <?php endwhile;
    else :

    endif;
  ?>

</section>
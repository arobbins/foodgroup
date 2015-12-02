<section class="l-col component component-default">
  <div class="wrap l-center">

    <?php
      // check if the repeater field has rows of data
      if(have_rows('default_rows')):

        // loop through the rows of data
        while (have_rows('default_rows') ) : the_row(); ?>

          <div class="l-row">
          <?php if(have_rows('default_columns')):

            // loop through the rows of data
            while (have_rows('default_columns') ) : the_row(); ?>

              <div class="l-grid-item <?php if(get_sub_field('default_columns_width') == null) { echo 'l-fit'; } else { the_sub_field('default_columns_width');} ?>">
                <?php the_sub_field('default_columns_content'); ?>
              </div>

            <?php endwhile;

          endif; ?>
          </div>

        <?php endwhile;

      else:

      endif;

    ?>

  </div>
</section>
<section class="staff">

  <ul class="staff-list">
  <?php

    $staffType = $staff_atts['type'];

    $my_posts = new WP_Query(array(
      'post_type'   => 'staff',
      'showposts'   => -1,
      'orderby'     => 'title',
      'order'       => 'ASC'
    ));

    if($my_posts->have_posts()) :

      while($my_posts->have_posts()) :

        $my_posts->the_post();

          if($staffType === 'board') {
            if(get_field('staff_board')) { ?>

              <li class="staff-list-item">
                <img src="<?php the_field('staff_image'); ?>" class="staff-image">
                <span class="staff-info staff-name"><?php the_field('staff_name'); ?></span>
                <span class="staff-info staff-title"><?php the_field('staff_company'); ?></span>
              </li>

            <?php }

          } else {

            if(!get_field('staff_board')) { ?>

            <li class="staff-list-item">
              <img src="<?php the_field('staff_image'); ?>" class="staff-image">
              <span class="staff-info staff-name"><?php the_field('staff_name'); ?></span>
              <span class="staff-info staff-title"><?php the_field('staff_title'); ?></span>
              <a href="mailto:<?php the_field('staff_email'); ?>" class="staff-info staff-email"><?php the_field('staff_email'); ?></a>
              <span class="staff-info staff-phone"><?php the_field('staff_phone'); ?></span>
            </li>

            <?php }
          }

      endwhile;

      wp_reset_postdata();

    endif;

  ?>
  </ul>
</section>
<section class="widget widget-contact">
  <h4 class="widget-title"><?php echo $title; ?></h4>

  <div class="address">
    <span class="address-street"><?php the_field('global_address_street', 'option'); ?></span>
    <span class="address-street"><?php the_field('global_address_city_zip', 'option'); ?></span>
  </div>

  <div class="contact">
    <p class="contact-phone"><i class="fa fa-phone"></i> <?php the_field('global_contact_phone', 'option'); ?></p>
    <a href="<?php the_field('global_contact_email', 'option'); ?>" class="contact-email"><i class="fa fa-envelope"></i> <?php the_field('global_contact_email', 'option'); ?></a>
  </div>

  <ul class="social">
    <?php
      if(have_rows('global_social_sites', 'option')):
        while (have_rows('global_social_sites', 'option')) : the_row(); ?>
          <li class="social-site">
            <a href="<?php the_sub_field('global_social_site_link', 'option'); ?>" class="social-site-link"><i class="fa <?php the_sub_field('global_social_site_icon', 'option'); ?>"></i></a>
          </li>
        <?php endwhile;
      else :

      endif;
    ?>
  </ul>
</section>
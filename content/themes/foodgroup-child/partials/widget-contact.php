<section class="widget widget-contact">
  <h1><?php echo $title; ?></h1>

  <div class="address">
    <span class="address-street"><?php the_field('global_address_street', 'option'); ?></span>
    <span class="address-street"><?php the_field('global_address_city_zip', 'option'); ?></span>
  </div>

  <div class="contact">
    <span class="contact-phone"><?php the_field('global_contact_phone', 'option'); ?></span>
    <a href="<?php the_field('global_contact_email', 'option'); ?>" class="contact-email"><?php the_field('global_contact_email', 'option'); ?></a>
  </div>

  <ul class="social">
    <?php
      if(have_rows('global_social_sites', 'option')):
        while (have_rows('global_social_sites', 'option')) : the_row(); ?>
          <li class="social-site">
            <a href="<?php the_sub_field('global_social_site_link', 'option'); ?>"><i class="fa <?php the_sub_field('global_social_site_icon', 'option'); ?>"></i> <?php the_sub_field('global_social_site_text', 'option'); ?></a>
          </li>
        <?php endwhile;
      else :

      endif;
    ?>
  </ul>
</section>
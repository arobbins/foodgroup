<section class="partners">
  <?php

    $my_posts = new WP_Query(array(
      'post_type' => 'partners',
      'showposts' => -1
    ));

    $partners = [];
    $tiers = [];

    if($my_posts->have_posts()) :

      while($my_posts->have_posts()) :

        $my_posts->the_post();

        $tierStringOrig = get_field('partner_tier');

        $tierString = $tierStringOrig;

        $tierStringModified = explode('-', $tierString);
        $tierString = array_shift($tierStringModified);

        $tierInt = (int)str_replace(array("$", ",", " "), "", $tierString);

        // Storing our original and modified values for later use
        $tiers[$tierInt] = $tierStringOrig;

        if(array_key_exists($tierInt, $partners)) {
          array_push($partners[$tierInt], get_the_id());

        } else {
          $partners[$tierInt][] = get_the_id();

        }

      endwhile;

      wp_reset_postdata();

    endif;

    krsort($partners);

  ?>

  <?php foreach($partners as $key => $value) { ?>
    <section class="partner-tier">
      <h2 class="partner-tier-title"><?php echo $tiers[$key]; ?></h2>
      <ul class="partner-list">
        <?php foreach ($value as $id) { ?>
          <li class="partner-list-item">
            <a href="<?php the_field('partner_link', $id); ?>" class="partner-logo-link">
              <img src="<?php the_field('partner_logo', $id); ?>" class="partner-logo" />
            </a>
          </li>
        <?php } ?>
      </ul>
    </section>
  <?php } ?>

</section>


<?php

  if(have_rows('components')):

    while(have_rows('components')) : the_row();

      //
      // Default
      //
      if(get_row_layout() == 'component_default'):

        get_template_part('components/default/default');

      //
      // Illustration
      //
      elseif(get_row_layout() == 'component_illustration'):

        get_template_part('components/illustration/illustration');

      //
      // Video
      //
      elseif(get_row_layout() == 'component_video'):

        get_template_part('components/video/video');

      //
      // How it works
      //
      elseif(get_row_layout() == 'component_how_it_works'):

        get_template_part('components/how-it-works/how-it-works');

      //
      // Featured Content
      //
      elseif(get_row_layout() == 'component_featured_content'):

        get_template_part('components/featured-content/featured-content');

      endif;

    endwhile;

  else:

  endif;

?>
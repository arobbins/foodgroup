<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'centric', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'centric' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Centric Theme', 'centric' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/centric/' );
define( 'CHILD_THEME_VERSION', '1.1' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'centric_load_scripts' );
function centric_load_scripts() {

  // Styles
  wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );

  wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css', array());

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,700|Spinnaker', array(), CHILD_THEME_VERSION );

	wp_enqueue_style( 'dashicons' );


  // Scripts
  wp_enqueue_script( 'resizeend', get_stylesheet_directory_uri() . '/js/vendor/resizeend.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'fit-vids', get_stylesheet_directory_uri() . '/js/vendor/fitvids.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'images-loaded', get_stylesheet_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'centric-global', get_bloginfo('stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0', true );

}

//* Add new image sizes
add_image_size( 'featured-page', 960, 700, TRUE );
add_image_size( 'featured-post', 400, 300, TRUE );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'height'          => 80,
	'width'           => 360,
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer',
) );

//* Add support for additional color style options
add_theme_support( 'genesis-style-selector', array(
	'centric-pro-charcoal' => __( 'Centric Charcoal', 'centric' ),
	'centric-pro-green'    => __( 'Centric Green', 'centric' ),
	'centric-pro-orange'   => __( 'Centric Orange', 'centric' ),
	'centric-pro-purple'   => __( 'Centric Purple', 'centric' ),
	'centric-pro-red'      => __( 'Centric Red', 'centric' ),
	'centric-pro-yellow'   => __( 'Centric Yellow', 'centric' ),
) );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary navigation menu
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'centric' ) ) );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Reposition Page Title
add_action( 'genesis_before', 'centric_post_title' );
function centric_post_title() {

	if ( is_page() and !is_page_template() ) {
		// remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		// add_action( 'genesis_after_header', 'centric_open_post_title', 1 );
		// add_action( 'genesis_after_header', 'genesis_do_post_title', 2 );
		// add_action( 'genesis_after_header', 'centric_close_post_title', 3);
	} elseif ( is_category() ) {
		remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
		add_action( 'genesis_after_header', 'centric_open_post_title', 1 ) ;
		add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 2 );
		add_action( 'genesis_after_header', 'centric_close_post_title', 3 );
	} elseif ( is_search() ) {
        remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
        add_action( 'genesis_after_header', 'centric_open_post_title', 1 ) ;
        add_action( 'genesis_after_header', 'genesis_do_search_title', 2 );
        add_action( 'genesis_after_header', 'centric_close_post_title', 3 );
    }

}

function centric_open_post_title() {
	echo '<div class="page-title"><div class="wrap">';
}

function centric_close_post_title() {
	echo '</div></div>';
}

//* Prevent Page Scroll When Clicking the More Link
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
function remove_more_link_scroll( $link ) {

	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;

}

//* Modify the size of the Gravatar in author box
add_filter( 'genesis_author_box_gravatar_size', 'centric_author_box_gravatar_size' );
function centric_author_box_gravatar_size( $size ) {

	return 96;

}

//* Modify the size of the Gravatar in comments
add_filter( 'genesis_comment_list_args', 'centric_comment_list_args' );
function centric_comment_list_args( $args ) {

    $args['avatar_size'] = 60;
	return $args;

}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'centric_remove_comment_form_allowed_tags' );
function centric_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;

}

//* Add support for 4-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Relocate after entry widget
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_after_entry', 'genesis_after_entry_widget_area', 5 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-widgets-1',
	'name'        => __( 'Home 1', 'centric' ),
	'description' => __( 'This is the first section of the home page.', 'centric' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-widgets-2',
	'name'        => __( 'Home 2', 'centric' ),
	'description' => __( 'This is the second section of the home page.', 'centric' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-widgets-3',
	'name'        => __( 'Home 3', 'centric' ),
	'description' => __( 'This is the third section of the home page.', 'centric' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-widgets-4',
	'name'        => __( 'Home 4', 'centric' ),
	'description' => __( 'This is the fourth section of the home page.', 'centric' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-widgets-5',
	'name'        => __( 'Home 5', 'centric' ),
	'description' => __( 'This is the fifth section of the home page.', 'centric' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-widgets-6',
	'name'        => __( 'Home 6', 'centric' ),
	'description' => __( 'This is the sixth section of the home page.', 'centric' ),
) );


add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
  $args['home'] = 'Home';
  $args['sep'] = ' / ';
  $args['list_sep'] = ', '; // Genesis 1.5 and later
  $args['prefix'] = '<div class="breadcrumb">';
  $args['suffix'] = '</div>';
  $args['heirarchial_attachments'] = true; // Genesis 1.5 and later
  $args['heirarchial_categories'] = true; // Genesis 1.5 and later
  $args['display'] = true;
  $args['labels']['prefix'] = '';
  $args['labels']['author'] = 'Archives for ';
  $args['labels']['category'] = 'Archives for '; // Genesis 1.6 and later
  $args['labels']['tag'] = 'Archives for ';
  $args['labels']['date'] = 'Archives for ';
  $args['labels']['search'] = 'Search for ';
  $args['labels']['tax'] = 'Archives for ';
  $args['labels']['post_type'] = 'Archives for ';
  $args['labels']['404'] = 'Not found: '; // Genesis 1.5 and later
return $args;
}


//
// Changing the Footer text
//
function sp_footer_creds_filter($creds) {

  $date = date("Y");
  $blogtitle = get_bloginfo("name");

  $creds = 'Copyright [footer_copyright] - '  . $blogtitle;
  return $creds;
}

add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');


//
// Remove default header
//
function injectHeader() { ?>

  <div id="title-area" class="header-logo-wrap">
    <a href="<?php echo home_url(); ?>" class="header-logo">
      <img src="<?php the_field('global_logo', 'option'); ?>" alt="The Food Group" />
    </a>
  </div>

  <div class="header-navs">
    <ul class="social-sites header-social">
      <?php if( get_field('global_social_sites', 'option') ): ?>

        <?php while( has_sub_field('global_social_sites', 'option') ): ?>

          <li class="social-site">
            <a href="<?php the_sub_field('global_social_site_link', 'option'); ?>" class="social-site-link">
              <i class="fa <?php the_sub_field('global_social_site_icon', 'option'); ?>"  class="social-site-icon"></i>
            </a>
          </li>

        <?php endwhile; ?>

      <?php endif; ?>
    </ul>

    <?php wp_nav_menu(array('menu' => 'Secondary Navigation')); ?>
    <?php wp_nav_menu(array('menu' => 'Primary Navigation')); ?>

    <div class="nav-mobile">
      <?php wp_nav_menu(array('menu' => 'Mobile Navigation')); ?>
    </div>

    <div class="mobile-nav-icon">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

  </div>

<?php }

remove_action('genesis_header','genesis_do_header');
add_action('genesis_header','injectHeader');


// function include_custom_components() {

//   $page_id = get_queried_object_id();
//   $meta = get_post_meta($page_id);

//   if(isset($meta['_genesis_layout'])) {
//     $layoutType = $meta['_genesis_layout'];
//     echo 'made it';
//   } else {
//     echo 'not made it';
//     return;
//   }

//   if($layoutType[0] === 'full-width-content') {
//     get_template_part('templates/layout', 'components');
//   }

// }

// add_action( 'genesis_before_footer', 'include_custom_components', 5 );


remove_action( 'genesis_after_header','genesis_do_nav' ) ;
 add_action( 'genesis_header_right','genesis_do_nav' );
 add_theme_support( 'genesis-structural-wraps', array( 'header', 'menu-secondary', 'footer-widgets', 'footer' ) );//menu-primary is removed


//
// Inserting custom ACF components
//
function rtug_after_header() {
  if(have_rows('components')):

    while(have_rows('components')) : the_row();

      //
      // Slider
      //
      if(get_row_layout() == 'component_slider'):

        get_template_part('components/slider/slider');

      endif;

    endwhile;

  else:

  endif;
}

add_action( 'genesis_after_header', 'rtug_after_header' );


//
// Grabbing recipe categories to load into recipe selection
//
function acf_load_icon_field_choices_location_cats($field) {

  // reset choices
  $field['choices'] = array();

  // if has rows
  if( have_rows('global_recipes', 'option') ) {

    // while has rows
    while( have_rows('global_recipes', 'option') ) {

      // instantiate row
      the_row();

      // vars
      $value = get_sub_field('global_recipe_category');
      $label = get_sub_field('global_recipe_category');

      // append to choices
      $field['choices'][ $value ] = $label;

    }

  }

  // return the field
  return $field;


}

add_filter('acf/load_field/name=recipe_category', 'acf_load_icon_field_choices_location_cats');


//
// Grabbing recipe categories to load into recipe selection
//
function acf_load_icon_field_choices_cat_image($field) {
  // print_r($field);
  // reset choices
  $field['choices'] = array();

  // if has rows
  if( have_rows('global_recipes', 'option') ) {

    // while has rows
    while( have_rows('global_recipes', 'option') ) {

      // instantiate row
      the_row();

      // vars

      $img = get_sub_field('global_recipe_image');
      $label = get_sub_field('global_recipe_category');

      // append to choices
      $field['choices'][$img] = $label;

      // echo "<pre>";
      // print_r($field['choices']);
      // echo "</pre>";

    }

  }

  // return the field
  return $field;


}

add_filter('acf/load_field/name=recipe_category_image', 'acf_load_icon_field_choices_cat_image');


//
// Get Children of specified page
//
function getPageChildren($page_id, $post_type = 'page') {
  // Set up the objects needed
  $custom_wp_query = new WP_Query();
  $all_wp_pages    = $custom_wp_query->query( array( 'post_type' => $post_type, 'posts_per_page' => -1 ) );

  // Filter through all pages and find specified page's children
  $page_children = get_page_children( $page_id, $all_wp_pages );

  return $page_children;
}


//
// Adding our columns component to the end of post content
//
// function custom_column_content() {

//   $page_id = get_queried_object_id();
//   $meta = get_post_meta($page_id);

//   if(isset($meta['_genesis_layout'])) {
//     // return;
//     echo 'tthere';
//   } else {
//     echo 'here';
//   }

// }

// add_action( 'genesis_after_entry', 'custom_column_content', 9);




function get_custom_components() {

  get_template_part('templates/layout', 'components');

}

function get_custom_columns() {

  if(have_rows('components')):

    while(have_rows('components')) : the_row();

      //
      // Default
      //
      if(get_row_layout() == 'component_default'):

        get_template_part('components/default/default');

      endif;

    endwhile;

  else:

  endif;

}

function include_custom_components() {

  $page_id = get_queried_object_id();
  $meta = get_post_meta($page_id);

  if(isset($meta['_genesis_layout']) && $meta['_genesis_layout']) {

    add_action( 'genesis_before_footer', 'get_custom_columns', 5);
    add_action( 'genesis_before_footer', 'get_custom_components', 6);

  } else {

    add_action( 'genesis_after_entry', 'get_custom_columns', 5);
    add_action( 'genesis_before_footer', 'get_custom_components', 6);
  }

}

add_action( 'genesis_after_header', 'include_custom_components');

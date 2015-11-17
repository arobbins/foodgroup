<?php

//* Centric Theme Setting Defaults
add_filter( 'genesis_theme_settings_defaults', 'centric_theme_defaults' );
function centric_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 10;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 500;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['image_alignment']           = 'alignleft';
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

//* Centric Theme Setup
add_action( 'after_switch_theme', 'centric_theme_setting_defaults' );
function centric_theme_setting_defaults() {

	if( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 10,
			'content_archive'           => 'full',
			'content_archive_limit'     => 500,
			'content_archive_thumbnail' => 0,
			'image_alignment'           => 'alignleft',
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	} else {

		_genesis_update_settings( array(
			'blog_cat_num'              => 10,
			'content_archive'           => 'full',
			'content_archive_limit'     => 500,
			'content_archive_thumbnail' => 0,
			'image_alignment'           => 'alignleft',
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}

	update_option( 'posts_per_page', 10 );

}

//* Simple Social Icon Defaults
add_filter( 'simple_social_default_styles', 'centric_social_default_styles' );
function centric_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'aligncenter',
		'background_color'       => '#ffffff',
		'background_color_hover' => '#2e2f33',
		'border_radius'          => 50,
		'icon_color'             => '#2e2f33',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 60,
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}

//
// Creating custom option pages
//
if(function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'  => 'Global Settings',
    'menu_title'  => 'Global Settings',
    'menu_slug'   => 'global-settings',
    'capability'  => 'edit_posts',
    'icon_url'    => 'dashicons-hammer',
    'redirect'    => false
  ));

}

//
// Changing the default Wordpress login logo
//
function custom_login_logo() { ?>
  <style type="text/css">
    .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-primary.svg);
      padding-bottom: 20px;
      width: 300px;
      background-size: contain;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');


//
// Partners Shortcode
//
function show_partners() {

  ob_start();
  get_template_part('templates/layout-partners');
  $content = ob_get_contents();
  ob_end_clean();
  return $content;

}
add_shortcode('partners', 'show_partners');


//
// Staff Shortcode
//
function show_staff( $atts ) {

  $staff_atts = shortcode_atts( array(
    'type' => 'All'
  ), $atts);

  ob_start();
  include(STYLESHEETPATH . '/templates/layout-staff.php');
  $content = ob_get_clean();
  return $content;

}
add_shortcode( 'staff', 'show_staff' );


//
// Publications Shortcode
//
function show_publications() {

  ob_start();
  get_template_part('templates/layout-publications');
  $content = ob_get_contents();
  ob_end_clean();
  return $content;

}
add_shortcode('publications', 'show_publications');


//
// Publications Shortcode
//
function show_recipes() {

  ob_start();
  get_template_part('templates/layout-recipes');
  $content = ob_get_contents();
  ob_end_clean();
  return $content;

}
add_shortcode('recipes', 'show_recipes');
<?php

  //support
  add_theme_support('menus');
  add_theme_support('automatic-feed-links');
  add_theme_support( 'custom-header' );
  add_theme_support( 'custom-background' );
  add_theme_support( 'post-thumbnails' );

   // CSS styles
  function wp_portfolio_theme_style(){
    wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu');
  }

  add_action('wp_enqueue_scripts', 'wp_portfolio_theme_style');

  //Javascript link
  function wp_portfolio_scripts(){
    wp_enqueue_script('script', get_template_directory_uri() . '/script.js', array( 'jquery' ));
  }

  add_action( 'wp_enqueue_scripts', 'wp_portfolio_scripts' );

  // Jquery
  function shapeSpace_include_custom_jquery() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

  }
  add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');


  //remove admin nav bar
  add_action('get_header', 'remove_admin_login_header');

  function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }


  // Google Maps

  function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyCjVV4g5KdNO5ql4JfhSkeGZdjOrEjFpxs
  ';
    
    return $api;
    
  }

  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

  function create_post_type() {
    register_post_type( 'galleries', array(
        'public' => true,
        'menu_icon' => 'dashicons-format-image',
        'label' => 'Gallery',
        'supports' => array( 'title' )
      )   
    );
    register_post_type( 'testimonials', array(
        'public' => true,
        'menu_icon' => 'dashicons-format-status',
        'label' => 'Testimonials',
        'supports' => array( 'title', 'editor', 'custom-fields' )
      )   
    );
  }
  add_action( 'init', 'create_post_type' )
?>
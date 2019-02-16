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

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu');
  }

  add_action('wp_enqueue_scripts', 'wp_portfolio_theme_style');

  //Javascript link
  function wp_portfolio_scripts(){
    wp_enqueue_script('script', get_template_directory_uri() . '/script.js', array( 'jquery' ));
  }

  add_action( 'wp_enqueue_scripts', 'wp_portfolio_scripts' );

  //remove admin nav bar
  add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
?>
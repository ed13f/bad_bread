<?php


  // ======================================[MailChimp Integration]============================================//

function rudr_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
  $data = array(
    'apikey'        => $api_key,
        'email_address' => $email,
    'status'        => $status,
    'merge_fields'  => $merge_fields
  );
  $mch_api = curl_init(); // initialize cURL connection
 
  curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
  curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
  curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
  curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
  curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
  curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
  curl_setopt($mch_api, CURLOPT_POST, true);
  curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
 
  $result = curl_exec($mch_api);
  return $result;
}


function rudr_mch_subscribe(){
  $list_id = '29428fc846';
  $api_key = '1971b91bf0aae20121e0099ccb71cf97-us4';
  $result = json_decode( rudr_mailchimp_subscriber_status($_POST['email'], 'subscribed', $list_id, $api_key, array('FULLNAME' => $_POST['fullname'], 'LOCATION' => $_POST['location'], 'PHONE' => $_POST['phone_number'], 'EMAIL' => $_POST['email'], 'DESCRIPT' => $_POST['description']) ) );
  // print_r( $result ); 
  if( $result->status == 400 ){
    foreach( $result->errors as $error ) {
      echo '<p>Error: ' . $error->message . '</p>';
    }
  } elseif( $result->status == 'subscribed' ){
    echo 'Thank you, ' . $result->merge_fields->FNAME . '. You have subscribed successfully';
  }
  // $result['id'] - Subscription ID
  // $result['ip_opt'] - Subscriber IP address
  die;
}
 
add_action('wp_ajax_mailchimpsubscribe','rudr_mch_subscribe');
add_action('wp_ajax_nopriv_mailchimpsubscribe','rudr_mch_subscribe');





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


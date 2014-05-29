<?php

  add_action( 'wp_enqueue_scripts', 'mockup_wp_enqueue_styles' );

  /**
   * Enqueue all necesary styles to header
   * @return void
   */
  function mockup_wp_enqueue_styles() {

    global $wp_styles;

    wp_enqueue_style( 'bootstrap' , THEME_URL .'/css/bootstrap.min.css', array()  , '1.0.0' , 'all' );
    wp_enqueue_style( 'mockup' , THEME_URL .'/css/mockup.css', array()  , '1.0.0' , 'all' );

  }

  add_action( 'wp_enqueue_scripts', 'mockup_wp_enqueue_scripts', 9 );

  /**
   * Enqueue all necesarry css styles to header
   * @return void
   */
  function mockup_wp_enqueue_scripts() {

    global $wp_scripts;

    ## HEAD scritps
    if ( ! function_exists( 'wp_check_browser_version' ) )
      include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );

    ## IE version conditional enqueue
    /* $response = wp_check_browser_version();
    var_dump($response);
    if ( 0 > version_compare( intval( $response['version'] ) , 9 ) ) {
      wp_enqueue_script( 'html5tags', THEME_URL .'/js/html5tags.js', array(), '1.0.0' );
      wp_enqueue_script( 'html5shiv', THEME_URL .'/js/html5shiv.js', array(), '3.7.0' );
      wp_enqueue_script( 'respond' );
    } */

    #wp_deregister_script( 'jquery' );
    #wp_enqueue_script( 'jquery', THEME_URL .'/js/jquery.min.js', array(), '1.11.0' , true );
    #wp_enqueue_script( 'modernizr', THEME_URL .'/js/modernizr.min.js', array(), '2.7.1' , true );
    #wp_enqueue_script( 'idangerous', THEME_URL .'/js/idangerous.swiper.min.js', array(), '2.5.5' , true );
    wp_enqueue_script( 'fbConnectMockup', THEME_URL .'/js/facebook.js', array('jquery'), '1.0.2' , true );
    wp_localize_script( 'fbConnectMockup', 'fbConnectMockup', array( 'fbAppID' => FB_APP_ID, 'facebook_secret' => FB_SECRET  ) );
  }

?>
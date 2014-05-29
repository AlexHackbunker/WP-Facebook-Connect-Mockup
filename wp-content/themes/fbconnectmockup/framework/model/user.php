<?php

 function mockup_facebook_user_exists () {
    global $facebook;

    try {

      $facebook_id    = $facebook->getUser();

    } catch (FacebookApiException $e) {
      wp_die( $e->getMessage() );
    }

    $args = array(
      'meta_key'     => '_facebook_id',
      'meta_value'   => $facebook_id,
      'meta_compare' => '=='
    );

    $user_query = new WP_User_Query( $args );
    //screen_log( $user_query );
    if ( ! empty( $user_query->results ) ) {
      $user = $user_query->results[0];

      //screen_log($user);
      $creds['user_login']     = $user->user_login;
      $creds['remember']       = true;
      $creds['user_password']  = md5( $facebook_id );
      $user                    = wp_signon( $creds, false );

      wp_redirect('/home/');
      exit;
    } else {
      wp_redirect('/registro/');
      exit;
    }

}

 /**
   * Checks Facebook Open Graph for the logged user
   * @return  Array user info
   */
  function get_facebook_user() {

    global $facebook;

    $user_data = array();

    try {

      $facebook_id = $facebook->getUser();
      if ( $facebook_id != 0 ) {

        $user_profile   = $facebook->api('/me');
        $user_name      = $user_profile['name'];
        $user_firstname = $user_profile['first_name'];
        $user_lastname  = $user_profile['last_name'];
        $user_email     = $user_profile['email'];
        $user_gender    = $user_profile['gender'];

        $user_data =  array(
		      'user_login'       => $user_name, /* Consideramos el atributo name como el login de WP */
		      'user_firstname'   => $user_firstname,
		      'user_lastname'    => $user_lastname,
		      'user_email'       => $user_email,
		      'user_gender'      => $user_gender,
		      'user_facebook_id' => $facebook_id,
		    );

      }

     // screen_log($user_profile);
    } catch (FacebookApiException $e) {
      //screen_log($e);
      return new WP_Error('facebook-error', 'Unexpected error');
    }

    return $user_data;

  }
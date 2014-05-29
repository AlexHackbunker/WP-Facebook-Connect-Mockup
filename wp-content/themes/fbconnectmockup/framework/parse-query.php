<?php

  add_action('parse_query', 'mockup_parse_pages');

  function mockup_parse_pages( $wp_query ) {

    global $wp_rewrite;

    if ( $wp_query->is_page() ) {

      if ( get_query_var('pagename') == 'auth' && get_query_var('oauth_provider') == 'facebook' ) {
        mockup_facebook_user_exists();
      }

    }

  }

?>
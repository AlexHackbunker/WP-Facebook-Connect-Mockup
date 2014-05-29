<?php

	define("SITE_URL"		  , get_bloginfo('url') );
	define("THEME_URL"		, get_template_directory_uri() );

	define("FB_APP_ID"		   , 'xxxxxxxx' );
	define("FB_APP_SECRET"	 , 'yyyyyyyy' );

		// Facebook auth
  $facebook = new Facebook(array(
    'appId'  => FB_APP_ID,
    'secret' => FB_APP_SECRET,
    'cookie' => true
  ));
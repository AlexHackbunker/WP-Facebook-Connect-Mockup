<?php

	# LIBRARIES : FACEBOOK SDK
  require_once( TEMPLATEPATH . '/framework/libs/facebook-php-sdk/facebook.php');

	# CORE
  require_once( TEMPLATEPATH . '/framework/wp-setup.php');
	require_once( TEMPLATEPATH . '/framework/wp-init.php');
	require_once( TEMPLATEPATH . '/framework/parse-query.php');

	# THEME
  require_once( TEMPLATEPATH . '/framework/theme/enqueue-scripts.php');

  # DEBUG
	require_once( TEMPLATEPATH . '/framework/tools/debug.php');

	 # MODEL
	require_once( TEMPLATEPATH . '/framework/model/user.php');
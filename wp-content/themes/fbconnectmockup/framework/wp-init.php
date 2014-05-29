<?php

	add_action( 'init', 'wphack_session_start' );

	function wphack_session_start() {

		$sesion_id = session_id();
		if(session_id() == '') {
    	session_start();
		}

	}

	add_action('init', 'mockup_rewrite_rules');

	function mockup_rewrite_rules() {

		// TAGS
		add_rewrite_tag('%oauth_provider%','([^&]+)');

		// REWRITES RULES
		add_rewrite_rule('auth/([^/]*)/?','index.php?pagename=auth&oauth_provider=$matches[1]','top');

	}

?>
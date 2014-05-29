<?php

function screen_log( $array, $title = NULL ) {
		echo '<pre>';
		if ( $title != NULL ) {
			echo '<h2>' . $title . '</h2>';
		}
		echo print_r( $array, 1 );
		echo '</pre>';
	}
<?php session_start(); ?>

<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<title>Facebook Javascript SDK</title>
</head>
<body>
	<div id="fb-root"></div>

	<h1>Ejemplo de getLoginStatus</h1>
	<p> En este ejemplo FB.init() tiene status = false, por lo que necesitamos FB.getLoginStatus() para obtener info sobre FB + App</p>
	<p>Status : <span id="response"></span></p>

	<!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>-->

	<script src="js/jquery.min.js"></script>
	<script>
		$( document ).ready( function() {

			var status;

		  $.ajaxSetup({ cache: true });
		  $.getScript('http://connect.facebook.net/es_ES/all.js', function(){

		    FB.init({
		      appId      : 'xxxxx',
		      status     : false
		    });

		    FB.getLoginStatus(function(response) {

		    	if (response.status === 'connected') {
			    	status = 'Logeado en Facebook y en la App ';
			    } else if (response.status === 'not_authorized') {
			    	status = 'Logueado en Facebook pero no en la App.';
			    } else {
			    	status = 'No esta logueado en Facebook, no tenemos info sobre la App';
			    }

			    $('#response').html( status );
			    console.log( status );

			  });

			}); /* getScript */
		}); /* Document Ready */

	</script>
</body>
</html>
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
  <title>Ejemplo de Event.Suscribe </title>
</head>
<body>
  <div id="fb-root"></div>
  <h1> Ejemplo de Event.Suscribe </h1>
  <p> En este ejemplo vamos a suscribirnos al evento que gestiona los likes / no-likes</p>
  <p id="response">Status : </p>

  <fb:like href="https://developers.facebook.com/docs/plugins/" layout="standard" action="like" show_faces="false" share="false"></fb:like><br/>

  <script src="js/jquery.min.js"></script>
  <script>
    $( document ).ready( function() {

      $.ajaxSetup({ cache: true });
      $.getScript('http://connect.facebook.net/es_ES/all.js', function(){

        FB.init({
          appId      : 'xxxxxxx',
          status     : true,
          cookie     : true
        });

        var likeBtnCallback = function(url, html_element) {
          console.log("> LIKE ");
          $('#response').html('Status : Like!! ');
        }

        var unlikeBtnCallback = function(url, html_element) {
          console.log("> UNLIKE ");
          $('#response').html('Status : UnLike!! ');
        }

        // In your onload handler
        FB.Event.subscribe('edge.create', likeBtnCallback );
        FB.Event.subscribe('edge.remove', unlikeBtnCallback );

      });
    });

  </script>
</body>
</html>
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
  <h1>Ejemplo de Fb.Login()</h2>
  <p>En este ejemplo Fb.Login() abre un popup nativo de Facebook y nos devuelve un response con información relativa al estado de la sesión </p>
  <p>Combinandolo con FB.Api podemos obtener información del usuario conectado = me </p>
  <button class="btn-facebok">Facebook connect</button>
  <p id="status">Status : Sin conectar</p>
  <p id="response"></p>

  <script src="js/jquery.min.js"></script>
  <script>
    $( document ).ready( function() {

      var status;

      $.ajaxSetup({ cache: true });
      $.getScript('http://connect.facebook.net/es_ES/all.js', function(){

        FB.init({
          appId      : 'xxxxxx',
          status     : false
        });

        $('.btn-facebok').on('click', function( e ) {

          e.preventDefault();

          FB.login(function(response) {

          console.log( response );

          if (response.authResponse) {

            $('#status').html( '>> Conectado a Facebook ' );

            FB.api('/me', function(response) {
              console.log( response );
              $('#response').html( 'Hola ' + response.name );
            });

          } else {
            $('#status').html( '>> El usuario ha cerrado la ventana popup' );
          }

          }, {scope: 'email'} );

        });

      }); /* getScript */
    }); /* Document Ready */

  </script>
</body>
</html>
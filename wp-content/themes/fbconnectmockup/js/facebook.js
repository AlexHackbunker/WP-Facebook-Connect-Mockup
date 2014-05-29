jQuery( document ).ready( function( $ ) {

  $.ajaxSetup({ cache: true });
  $.getScript('http://connect.facebook.net/es_ES/all.js', function(){

    FB.init({
      appId      : fbConnectMockup.fbAppID,
      status     : true,
      xfbml      : true,
      cookie     : true,
      oauth      : true,
      channelUrl : ''
    });


    $('.btn-facebook').on('click', function( e ) {

      e.preventDefault();

      FB.login(function(response) {

        console.log(response);

        if (response.authResponse) {
          location.href = '/auth/facebook/';
        }
      }, {scope: 'email'}); /* Aquí se añaden permisos extra como birthdate, publis_stream, user_likes */

    });

  });

});
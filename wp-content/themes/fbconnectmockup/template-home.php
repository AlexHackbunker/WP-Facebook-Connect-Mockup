<?php

  /*

  Template name: Home

  */

?>
<?php get_header(); ?>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo SITE_URL ?>">FB Connect Mockup</a>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo SITE_URL ?>/">Login</a></li>
            <li><a href="<?php echo SITE_URL ?>/registro">Registro</a></li>
            <li class="active"><a href="<?php echo SITE_URL ?>/home">Home</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Hola <?php echo $current_user->first_name ?>,  <a href="<?php echo SITE_URL ?>?action=logout">Logout</a></h1>
          <?php

              //global $current_user;
              //screen_log( $current_user );

          ?>

         </div>

      </div>

    </div>

<?php get_footer(); ?>
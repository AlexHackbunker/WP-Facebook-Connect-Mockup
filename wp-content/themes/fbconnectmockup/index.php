<?php

  /*

  Template name: Login

  */

  global $wpdb;

  $action = !empty( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';

  switch ( $action ) {

    case 'login':

    $errors = new WP_Error();

    if ( !empty($_POST['email']) ) {

      $user = get_user_by( 'email', sanitize_email( $_POST['email'] ) );

      if ( $user ) {

        //screen_log( $user );
        $creds = array();
        $creds['user_login']    = $user->user_login;
        $creds['remember']      = true;
        $creds['user_password'] = $_POST['pwd'];

        $user = wp_signon( $creds, false );

        if ( is_wp_error( $user ) ) {
          $errors->add( 'incorrect_password', 'Invalid username/password' );
        } else {
          wp_redirect('/home/');
          exit;
        }

      } else {
        $errors->add( 'incorrect_email', 'Email address doesn´t exits' );
      }

    }
    break;

    case 'logout' :
      wp_logout();
      break;

  }

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
            <li class="active"><a href="<?php echo SITE_URL ?>/">Login</a></li>
            <li><a href="<?php echo SITE_URL ?>/registro">Registro</a></li>
            <?php if ( current_user_can('read') ) { ?>
            <li><a href="<?php echo SITE_URL ?>/home">Home</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Login</h1>

           <?php if ( !empty($errors) && $errors->get_error_message() ) {
                    echo "<p class='bg-danger'>". $errors->get_error_message() ."</p>";
                 } ?>

          <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="alejandro.sevilla@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Contraseña">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="action" value="login">
                <button type="submit" class="btn btn-success">Entrar</button>
              </div>
            </div>
          </form>

          <h2 class="page-header">También puedes loguearte con Facebook</h1>
          <button type="button" class="btn btn-defautl btn-primary btn-facebook">Facebook Connect</button>
        </div>

      </div>

    </div>

<?php get_footer(); ?>
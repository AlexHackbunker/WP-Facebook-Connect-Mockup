<?php

  /*

  Template name: Register

  */

  $action = !empty( $_POST['action'] ) ? $_POST['action'] : '';

  switch ( $action ) {
    case 'register' :
      // sanitze fields
      $user_firstname   = sanitize_text_field( $_POST['first_name'] );
      $user_lastname    = sanitize_text_field( $_POST['last_name'] );
      $user_email       = sanitize_email( $_POST['email'] );
      $user_firstname   = sanitize_text_field( $_POST['first_name'] );
      $user_gender      = sanitize_text_field( $_POST['gender'] );
      $user_facebook_id = sanitize_text_field( $_POST['facebook_id'] );
      $user_phone       = sanitize_text_field( $_POST['phone'] );

      $user_password  = ( $_POST['facebook_id'] != '' )  ? md5( $user_facebook_id ) : sanitize_text_field( $_POST['password'] );
      $user_login     = ( $_POST['user_login']  != '' )  ? $_POST['user_login']  : sanitize_title( $user_firstname ) . '-' . sanitize_title( $user_lastname )  ;

      $userdata = array(
        'user_login'   => sanitize_title( $user_login ) ,
        'user_pass'    => $user_password,
        'first_name'   => $user_firstname,
        'last_name'    => $user_lastname,
        'user_email'   => $user_email
      );

      $user_id = wp_insert_user( $userdata ) ;
      if( ! is_wp_error( $user_id ) ) {

        add_user_meta( $user_id, '_user_phone',  $user_phone );
        add_user_meta( $user_id, '_user_gender', $user_gender );
        if ( $user_facebook_id != '' ) {
          add_user_meta( $user_id, '_facebook_id', $user_facebook_id );
        }

        $creds['user_login']    = sanitize_title( $user_login );
        $creds['user_password'] = $user_password;
        $creds['remember']      = true;

        //screen_log( $creds );

        $user = wp_signon( $creds, false );
        if ( ! is_wp_error( $user ) ) {
          wp_redirect('/home/');
          exit;
        }
        $err = $user->get_error_message();

      } else {
        $err = 'Unexpected error ' . $user_id->get_error_message();
      }
      break;

  default :

    $user_data = get_facebook_user();
    //var_dump ( $user_data );
    if ( !empty( $user_data ) ) {
      extract($user_data);
    }

    $user_firstname    = ( ! empty ( $user_firstname ) )    ? $user_firstname    : '';
    $user_lastname     = ( ! empty ( $user_lastname ) )     ? $user_lastname     : '';
    $user_email        = ( ! empty ( $user_email ) )        ? $user_email        : '';
    $user_gender       = ( ! empty ( $user_gender ) )       ? $user_gender       : '';
    $user_facebook_id  = ( ! empty ( $user_facebook_id ) )  ? $user_facebook_id  : '';
    $user_login        = ( ! empty ( $user_login ) )        ? $user_login        : '';
  }

?>
<?php get_header(); ?>

  <body>

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
            <li class="active"><a href="<?php echo SITE_URL ?>/registro">Registro</a></li>
            <?php if ( current_user_can('read') ) { ?>
            <li><a href="<?php echo SITE_URL ?>/home">Home</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Registro manual</h1>

          <?php echo ( ! empty( $err ) ) ? "<p class='bg-danger'>$err</p>" : "" ?>

          <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" name="first_name" class="form-control" id="inputEmail3" placeholder="Nombre" value="<?php echo $user_firstname; ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Apellidos</label>
              <div class="col-sm-10">
                <input type="text" name="last_name"  class="form-control" id="inputPassword3" placeholder="Apellidos" value="<?php echo $user_lastname; ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="Email" value="<?php echo $user_email; ?> ">
              </div>
            </div>
           <?php if ( empty ( $user_facebook_id ) ) { ?>
           <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
              </div>
            </div>
            <?php } ?>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Teléfono</label>
              <div class="col-sm-10">
                <input type="text" name="phone"  class="form-control" id="inputPassword3" placeholder="Teléfono" value="" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3"  class="col-sm-2 control-label">Sexo</label>
              <div class="col-sm-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" id="optionsRadios1" value="hombre" <?php checked( $user_gender, 'male' ); ?> >
                    Hombre
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" id="optionsRadios2" value="mujer" <?php checked( $user_gender, 'female' ); ?>>
                    Mujer
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="user_login"  value="<?php echo $user_login ?>" />
                <input type="hidden" name="facebook_id" value="<?php echo $user_facebook_id ?>" />
                <input type="hidden" name="action" value="register" />
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>
            </div>
            <h1 class="page-header">También puedes registrarte con</h1>
            <div class="form-group">
              <div class="col-sm-10">
                <button type="button" class="btn btn-defautl btn-primary btn-facebook">Facebook Connect</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>

<?php get_footer(); ?>
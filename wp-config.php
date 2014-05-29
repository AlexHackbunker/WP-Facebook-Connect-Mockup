<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'XXXXXX');
define('DB_USER', 'YYYYYY');
define('DB_PASSWORD', 'ZZZZZ');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-Qt@:z[@sc.^z_}hslNlKsb2Gi=D)K,hQ)-xo|?n3,T,&[MU^2:3Xx:Nr|wXEk<*');
define('SECURE_AUTH_KEY',  'mOw<qJP8a2wYE]m8Ymxl#: wS!TG/p+b7)+BZWSWA`mgxIFm#HCPNt#p+~ah+awF');
define('LOGGED_IN_KEY',    'p_jRQz;1Dh)=|-R|S++l;-S|40i.L0~4|qB>=C07t.6+FILU8I8_,Id^-5bwt2%P');
define('NONCE_KEY',        'GvQBr0yf4P]&S|IB-m`~apwBp_YQ&-9c{7pJwEj#_Kf`*[[[T8Dg7x8pnX|EJb0y');
define('AUTH_SALT',        'aWZw.(+N`3:`B8]cUH0U+6^|.rXdcz+zdtk jVyZlMrC{OK+CZ{b&dWVyvHl+M@S');
define('SECURE_AUTH_SALT', '&^+<y4CH!7$n|b9>kOV(FrDJs_]BV&8[S@y%0.|;0(wE!6G`8O-jmWW~HqUx6c&@');
define('LOGGED_IN_SALT',   '^o-|x>1Hs+B-H{CxLes5mb<dIV@k+MWLRi>p:ak|^2YC.tBSG1+!#)B(x]TEr]wx');
define('NONCE_SALT',       '%Gc28nZZ3BsJo>+iNG!T&J_8ywla8)%R/hhK=.nc[#Cb6W]rKHm4LxQ]^V|:0d{J');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', '');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


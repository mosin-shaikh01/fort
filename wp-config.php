<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u831484041_62ANy' );

/** Database username */
define( 'DB_USER', 'u831484041_2y1ta' );

/** Database password */
define( 'DB_PASSWORD', 'M3XTbXep#' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Rh$@Lie/Y3Bk0ugM4#d7DktUB;U1LD){q26nd|[C0mZ2|IWsxQB3#w>Oq}yA06,6' );
define( 'SECURE_AUTH_KEY',  'K [}7M-NOraNC=s/8SR:+z e}0f7d^ !P6 Ex4&#P!!^{IP.9?+W2AjDlon>g+k3' );
define( 'LOGGED_IN_KEY',    '!:.$Stp%}{pbY:6Z=0O~4ojR*v(=~o8q#yL?eGa+EyA3jp!|V)oKLA6~3q6lhT~d' );
define( 'NONCE_KEY',        'L|wG0xHy]:W-{-~L0U9;$Wr#?h_I7aufTEV 5szwJZ&;Vi6ItasoE/RD1Q=<[lO%' );
define( 'AUTH_SALT',        'FATPBFxOuc#Q-hWs)QbZ,B8&4U&.B95q%3gwE3SJ*c%QRO52)bNQ[C`v8w?0iqf.' );
define( 'SECURE_AUTH_SALT', '8lUAB ~sjE:%Ea<{Z-<$Nsf75jzaNA1m-7Rl_Ak]j6w%ZE)JE)3{)!SIO(Q:f(#h' );
define( 'LOGGED_IN_SALT',   '@t$U^CBKSoPvP/%h;&BI0K$^bV8D{~By8wB8Lvzo^>!sajhztB.]p%.~P[Ycvr.M' );
define( 'NONCE_SALT',       'f[3fVg,TRZ`EPh$~XgKD,qrd4^#ODRo/tYK2BBy2dC5waP`_H9<GX4ruozKa38q/' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

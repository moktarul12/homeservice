<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root@123' );

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
define( 'AUTH_KEY',         'PlB~7=ruH~nXfYJtbw_Sq-EMpw9[>$ Hh{,M?)ZA,s`|Y># hs)75w#9O{w [jc9' );
define( 'SECURE_AUTH_KEY',  '@5_;W>RO65gl@(&Q-A<Cup+ Y~XH7qV K_b+,=Khh&<hAIr()HSV^PW$}i+c6;Ha' );
define( 'LOGGED_IN_KEY',    'FV>~^ |W`NkL0I@eETf8(xWAG;!CCV4Sh2>`wj^%#@Sq:3M)G{)ch4_Z*A]ch=f@' );
define( 'NONCE_KEY',        'hte}E uKq~3^)%&`^rdwRBC qSgr6Gr2KZq=f{QlmgSP8;u!,wq]@@,ge5;M&5}8' );
define( 'AUTH_SALT',        '2bVZ8._YQ}}B$_QB1/]cvQts:rs 5u|Jz<7AC#*E=1B 2l@l9||8a|z53to16n/S' );
define( 'SECURE_AUTH_SALT', '@z$ p,YgtOFPhefjl.Gte@xAF%za~7rfigzVN)P7{L8aF?-@g!oGQ$EfrPgWxtMh' );
define( 'LOGGED_IN_SALT',   '!Gi12V&P~K|GV)]*=i[$C;`)T?J*=(#x*/|@n?vTEK-IUlTi3=(60YhKDaU(N)`^' );
define( 'NONCE_SALT',       'GE?B]Wp5l4AWNRC*+rWK}PdinR,m(kyilP-WgETu-RCdkm8h8;^?b:~2FnW*4{Qw' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rb_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

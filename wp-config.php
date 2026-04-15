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
define( 'DB_NAME', 'hidakaku' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Z{tKH7.wzLn}WMj2G(|6Rt[@]Fat;62l>G;{/dbr_=<BJ~]A*n^m`A]@Gi6VsmOU' );
define( 'SECURE_AUTH_KEY',  'n?BG0>8E8IzmzlLgId0a(Vwx[ap%SQO(fsZiSwm-3x8OSI}H|e9$gkMfy@^NU||L' );
define( 'LOGGED_IN_KEY',    'GRlCs]y{8|IfR)ltj7K;dNa7qLP]lSj=a7@=1anT}8K+jS39`d)3%{Z|6{g$yJ5D' );
define( 'NONCE_KEY',        '.HZvJ-voY`L(%U5x@igq-@uIo}}dr%YTRdJ9(Mn2>-qUUS>F/M]u|fstkq qZqV1' );
define( 'AUTH_SALT',        'i8;S#J&5b.H6sQ}qfHA05/4Z!Uj:], 4po6E!00P;@,7=p4+h@Y,LaMw``5W/v0u' );
define( 'SECURE_AUTH_SALT', '/P7>SwP_^hP/3`.@ZtY+elD/bW7u4W YUDQvSEg0p)/WvJ{Zl7pKYz-1%9CqIIE.' );
define( 'LOGGED_IN_SALT',   'v3nta0w@-C>cQs[h&._1ZBdz=tf0XcEpi8B?Go^18Sa}4{-7iVX5m_.`6&!^!$EG' );
define( 'NONCE_SALT',       ':R}SvyUwktCZZAN5epSjk:wyNcD$+US~}A%HkLHomwC386Hg]Y|[!qR^@0[Qx1`L' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

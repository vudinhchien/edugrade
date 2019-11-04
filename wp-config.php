<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'edugrade' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3H48YU8JZf%q~+]<)Re?l-KIb1r99J[5J(5e!8.j2CbFFhc2zAUb!,yJOca:<b]h' );
define( 'SECURE_AUTH_KEY',  'V}P&F6msj`rv5sn=4swQg#zO/8qY7.HOH/uMn;HcFn?VLV<j/C?=Zp!I<=8Y)3&2' );
define( 'LOGGED_IN_KEY',    'e~,WpK!Mp2(tLsJQ$YVd^oVmr:;tVW/odqGeEP7/3_F~;orOYBo&o;Eqw8ks:(9l' );
define( 'NONCE_KEY',        'Vn A{OA5V# 1v+ZSh^1WWZ~0=fqIvt{5GV]j0jo&xmG(^Rzy|IeNs!H`-ONXdWt#' );
define( 'AUTH_SALT',        '%MB]t6[2;xt~:UW?q7f~8MUg-+K;`f ice|(7f{FgWPWXd-&2vq/QS50~$^Zvz0e' );
define( 'SECURE_AUTH_SALT', 'aM44ry<{]*fYb9X|U;h(rYxAY1]Mb(=hO1 c;A=|`8]w/sRL:a7BVn^h18)DCy1m' );
define( 'LOGGED_IN_SALT',   '^8w{{_o4/K(xHs1UmFT&s-IQkfts-(imy{IILr6=g5cevp`%;+G,;[K2:{6-@OVM' );
define( 'NONCE_SALT',       '.Ya ouqq$F0D BH}HEI:%osw[8Kq]rF_hZdIQTg6gU6 ,2x&my:<9VYMewA4|#rq' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

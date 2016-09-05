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
define('DB_NAME', 'rawa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%;qdHY@2^x(p}3O$?kHd#Kv6^/E$GV9f*Br2x1MTYEQAZAq?3?UR^fYT~fg[sdY4');
define('SECURE_AUTH_KEY',  '>m7/T$J0CY%|VtFr<K?j=MS=Ce]4CK(>Z%< M(s51Z^~L{=l_tzYLH=:Pi!`~R9D');
define('LOGGED_IN_KEY',    '^kS?zgZ{X[T=,cdk0=ZEEgnWM~!;ObXY~enP:Lvo4tkk;G.wJoc77Ut|6w1(m)>3');
define('NONCE_KEY',        'ZPwp+^? FmSiRw/6`_JCUM0.G7>jfFUp=DME:,TXP~)P!@3_}PGK1KQgdsQ,!m55');
define('AUTH_SALT',        'TCx+&22%x)6{<WRkOaJV}.A-l@^T/%Aoc~`JWt9UB6LDPA>fX0Og8vN#tT.l.HnD');
define('SECURE_AUTH_SALT', 'sxqtg{/z,w~!v`adIk6 4O_P`ecC<?b(5q?lwZ]X}a|b;[mrM}lEYr5[nVnH@n|J');
define('LOGGED_IN_SALT',   ']?a>m/D_p;H-:ov5Om/U^.{L%Luzhw644Y)D+QDvAPF wnI,.vJHQjqeMiiO~+B4');
define('NONCE_SALT',       '2J:u=-Y9.W:* XZaA{A(e6(nnfCi~:hCkP4y9ZFjS{6(cgXdVK(<ecWi%sOp0!?p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

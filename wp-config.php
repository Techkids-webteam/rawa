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
define('DB_NAME', 'sv5t');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '%l#~ySFCtC_4fF&SXTZI`?*l/bl<j,af_q5 (N#/oL`CoFR^Tf%1WgC0S^I^D<yw');
define('SECURE_AUTH_KEY',  'E}.+L(%n9_grID?HV^4!=hN;dY32djo`ncyv{-;%t.4pIr)dWWKaUr!W:Vm*0Zzf');
define('LOGGED_IN_KEY',    ')4U)ND_&2C>k^FSsEwOES2`MN0yDgC>[IiD>nz9|($TQ_E9(]QR:<J7VBdGAZh7h');
define('NONCE_KEY',        'OLzfg{%1w-Qdd}isbn;CfJ-~RE0SVvF+20`eEyWmIu&i/d7zvMpVXB/W8Wb;~.+s');
define('AUTH_SALT',        'g}jAw7MB(r,G/?a=6.eA]%3-5,?vt6<[+[1hpc]7M/^MxMwH^EPHwDP<SQu>jRYA');
define('SECURE_AUTH_SALT', 'i%@Nu1RLtT]dg=soe0X[aTbh29Ohpsh?a=dH+Lh[G!3KyM,wh{u;^qh0X=6E%(fP');
define('LOGGED_IN_SALT',   '=CHI12gqaDI] `}rj%,%A^]Lw.UMy}=#PqUt<&~&<ZmrCozXZ);J|-5Fx1jCO$X:');
define('NONCE_SALT',       '[@- sS~M%hDc}b]!:s#zYx( Oys39$hm7&gzZs`V``?$@zaNSh:?-DIuTCT_P]q4');


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

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
define('DB_CHARSET', 'utf8');

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
 define('AUTH_KEY',         'BM</keCM=!ahk8k]ZD+@+;[(;!8*u3W]pl1|FOw9(I?6ksDnMZpt*Sl(GOd(@8BA');
 define('SECURE_AUTH_KEY',  'LL*1|wXyG~s%] .T|pbm~wE$(,(rpUr|qsx7[-rVq`!(|xXuNGK=k^oD{2-]~3U1');
 define('LOGGED_IN_KEY',    ')F!<W{.Gckq$ND^TL3HY<g/HOtH%#6`d11920M=*$6WtFL`b!@QsPCI_^nY[bI~}');
 define('NONCE_KEY',        't<Vx<R[H)q@W-f^bOk6<3<Qgz-%?KVD?|+w7-70EHcb0a~%Qc-1sn|(BE*-^#>^k');
 define('AUTH_SALT',        'z>WhzpE0;]CDc_|do/E)LIC?_B/8Epm_f+$TbN;4AdV%1q_1tAWnZy|}fa3%?rb2');
 define('SECURE_AUTH_SALT', '^j/WuNY1nC9@E<>Z1bJc g<U}vyl4em`bCE~GB3;>$PfZHJ?#FR=#{[mJs!z)%ul');
 define('LOGGED_IN_SALT',   'VmTb(g>+-}MqG.PZX0Gf=2M<$d#c/dXx#gkJD?~W%`a!G1xz2d}F~6H05(O+)heb');
 define('NONCE_SALT',       'Ok|5+5K3yq$(<H&U m3f12+(,/++{;43hjr2_:te:J|6]9OI7pu/zZ%i*3SO+$]}');

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

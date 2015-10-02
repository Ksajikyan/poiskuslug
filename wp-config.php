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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\xampp\htdocs\poiskuslug\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'poiskuslug');

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
define('AUTH_KEY',         'JeL5U t++bcSl]iN;YDANoS~+(n+xo@moqcx3Bq0|#qZ_v9BN7W]Asir(k4.<2Z<');
define('SECURE_AUTH_KEY',  'SN,($;+?5{5}3FJMJb;vN4li(`^c-XPcIn=!)iq]^@pBj.R`25r+^F{~h Gj<zJ*');
define('LOGGED_IN_KEY',    'JUI$:0W67dSTL:.K p)l({`ieH+E~6^QN+6w}k u|i_eUaJ58EC0w< q~Jp,#pkx');
define('NONCE_KEY',        'G6kO!s2ddp:?=ehy?(_{sATpM)tmJQGbH$|jmf[R9lBaGB,+2:hm-D !vRqmeOQg');
define('AUTH_SALT',        'zu}]*l+KH7izLo^rm~#tpB?GdE`m+{[9MHE0|H4rUMRNoSX~|v3LoeXSHZ!J;[]<');
define('SECURE_AUTH_SALT', 'Ch>!,B%:68=Nj/&ZeJrL:}^XC9({1pvx9GKe~jNT+R!)u~HUstcwBFkWj@|*.VO1');
define('LOGGED_IN_SALT',   'eT-+{JE^lL-4wptuh2274;%m`/?o=ecBK#hYDeU}}Rl4vDG3qf;kq|sf1>8G+,w?');
define('NONCE_SALT',       'T|gpTT;-1x q*RzG08)#!sgiyJ3ABg@PkC&Q-gkBCeug0I&#&~UhGS!P&`:zRgXE');

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

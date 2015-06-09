<?php


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'teresamoller');


/** MySQL database username */
define('DB_USER', 'system_admin');


/** MySQL database password */
define('DB_PASSWORD', 'smartbastard51');
//define('DB_PASSWORD', '');


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
define('AUTH_KEY',         'HfkqABofG1x^MS5d=L++dks,{,Y.e|5%y{j4~goiPveDuXtV/Ey9wH7rS-Z[D`x&');

define('SECURE_AUTH_KEY',  'cJMc@^WcD$KkITpRX*AO7U8o3`/.(0WxP%s2J,pzGi5D[PB#Bc@lrx%ClcC#)+S)');

define('LOGGED_IN_KEY',    'm(DMT*35O{x{pQus-vT|f+O*EXY(-ycw!RW/_&/NrvtX.ElC)5hD~pl=gss[c#]C');

define('NONCE_KEY',        '@yC`!6{XvIR?9e?VDp,$|xG]aFq^6{nS?A+h]uOZ?=)U`!sqy)3|y5MaA9G/l+px');

define('AUTH_SALT',        '(pWZ~rPI}XIr1o]n]Y]{SmX#j($-gL0QU)~!*hT;j2Pj#X!a,#{| t#kM}eSEyi?');

define('SECURE_AUTH_SALT', 'h}P>WSHc5rWo1nA5J_Z9BgYoi_L, l!FfH`5FP-ZnV0RAwsm<c;[sn(Um/rBudzy');

define('LOGGED_IN_SALT',   'idyR+YV6}NQ1!cpYq+^vj*_K.(-JvI3<yexb<3bdCD}RiiG03O~(sR+CC0511^ss');

define('NONCE_SALT',       '![LqQp4ku^9%{!Sa!Jndgc(ZKXsMb-]z|w*AXx,E64V/~$j:}:ufNrnt*G ?p,1^');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

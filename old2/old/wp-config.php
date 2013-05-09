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
define('DB_NAME', 'bigcity');

/** MySQL database username */
define('DB_USER', 'trino');

/** MySQL database password */
define('DB_PASSWORD', 'trino214526V');

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
define('AUTH_KEY',         '/^LuFmy-_2%nC0kEnu6YW,&Wz}flsR.|s3|Y=iw_.1QudBQM /#AuLp+Ih-a1:4l');
define('SECURE_AUTH_KEY',  'T$NIX`-l5}&=^(dL*j9UDMFUrGR^hv^(AWm%>nQ7tln-AG-??Yt~:,u+~O3}oNRR');
define('LOGGED_IN_KEY',    'xbf(sY3MTPZ4tawW&C&Y0{h+,7XztOEWtIgS>uFzHzO<(Q+zd#$wJssp`;@n?Kut');
define('NONCE_KEY',        '[]mmW[#o$yUK%AYJMR(s>nE](:It+K/3%5A|$ce+n !U{:+<`$[:0Y#MtFPXx^;j');
define('AUTH_SALT',        'X3D8^Pz5-u^[NvR*R0XfE<]7khZOs2[>[hxeFa-B!WRq<=k`u0f4i,v:k2s_X>ok');
define('SECURE_AUTH_SALT', 'XCj?+MAdnI3|TX21|LAIRWys @IKGqT?)oxFsF3|8qLA|[(ODkewjpy;)=te3y%=');
define('LOGGED_IN_SALT',   '9y0y=uq&!rTh{)c3E)Z[@ t(pTE29=/8-rAg&hKy+=l^[i5{$bwE$8=pB?eV2[90');
define('NONCE_SALT',       '(ITLxn<8l{)A46xyNkjV+fRgtar3YA0eb5[4B+kh:|tUr(FNtmTxkN`rqg`0.^_G');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

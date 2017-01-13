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
define('DB_NAME', 'wp_aviation-safety');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'H+-kjIsw~e<{]oE3J,xQ;T)Yyf6FJ!h^RvV2Bp^,DS2&;t|;i~KS<eP&,+X%8W<A');
define('SECURE_AUTH_KEY',  'C-^J2tlN/114L`<4rBH(8>[o@S%Z3-|kA_06ARXIbtZS2g65.E}SsF,Z7bY27N47');
define('LOGGED_IN_KEY',    '7~7;B_Q&!^RfPVw!+-z:&V n]bQ^<9Df+:@H4{zK|=i;9/Gum)/Aa:[S|hwv7B@f');
define('NONCE_KEY',        'xel;W7hFP{C6uTlY/hD[{j.BP4dI?4w/.0B60Q,@9;@Kr_r]=39[~]z_pr c1^!}');
define('AUTH_SALT',        '.eagvJ6M=xw`j aW,-udP8&3HatAA[,r<)b}&XD8{~`-0P]&|IF.+G`2{q36.;Bf');
define('SECURE_AUTH_SALT', 'JL9aJA%:t{f&z{<3, a%FMld+a+)Z5UtCx)<J&k!IMJj*JISmI.|dq:M|a.b~CC:');
define('LOGGED_IN_SALT',   ']4xxU$(&E6XlEq+Od@x -jn[yHi:3!~ZnhIJRy7hsW4h({ID0>#YoQ]6^{i9Y(|a');
define('NONCE_SALT',       'dq2_u;TnM]Xc$_dFM4cFR7Zk?_ <3*|8Jel3^KBO-9uAc])z7>6]hZsaG@5RQ.|Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

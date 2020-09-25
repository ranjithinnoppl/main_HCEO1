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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'new_wp1' );

/** MySQL database username */
define( 'DB_USER', 'innoppl' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '-5kcLs0@KDAL5{C[5JpIaq|w%x%(Hs2[*gMSS,L]9obarBzitd#D/k%@rw&@<_.y' );
define( 'SECURE_AUTH_KEY',  '~Y4zVNfdv<rjZjjc1bW@Usneb[_%5[U(+t-+:5I_yPx[68l^i9q~bpOZ+vETTt$[' );
define( 'LOGGED_IN_KEY',    '[Q9%d`c;45+IB3pH=li)RSKh_Vcsc)nPw0?A/*i{7jX0xsE;9|uq]_P,YV]pUPTX' );
define( 'NONCE_KEY',        'x|wXW?=J%$!b%d7}t<oe:qSMLd3)M(MN-0g@wV_NPJa=wYrB4=fQ>&jSA]|Hkrwn' );
define( 'AUTH_SALT',        'Z0d!8H?m%N:On0M/y^y=Iz6h== ~G|vB-@ugRpgf|sx}>ZZ`B$n/U]M=r71LB#H2' );
define( 'SECURE_AUTH_SALT', 'R<! I>($/QFhtCT7q Oi,!V)0]KO%%gm:m$Z{i_<Sz^W)b3(w~u{HjV2Dy|<%Nbc' );
define( 'LOGGED_IN_SALT',   '=HASR|{;V;`.W<MKTVk4]V&HdX<tU$(L:}~>&AF:%;.cCex8PUMMc.aMqZ]aSN8;' );
define( 'NONCE_SALT',       'wfYoTdf:PG2(^9Bl-LzWEgea_ <Vep]i *%:Iq`XOc++D(xwBc&TX3QtgW;8{(=D' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

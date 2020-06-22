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
define( 'DB_NAME', 'plugin_wp' );

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
define( 'AUTH_KEY',         '7P]WFr&J/[FN0D)Fpj!?8|%-1!1)f!5W(;z#,=k{K5amExGX|YKC-ARe3?FmKLHL' );
define( 'SECURE_AUTH_KEY',  '*Va6;Zo]/9!M/;UO>/$rjQP&2@WXEHAyylm5MCg=J8BgNG}y(- ]LoJ%^2~rnI!K' );
define( 'LOGGED_IN_KEY',    '[Y[8(:jGO_fTK#TsMi?V/ZO`mm<[ubh+9sn)Qd:0.Ss}l,m&#-,0olL`s=/E[|F:' );
define( 'NONCE_KEY',        'j*<z#L6|Qk].^BPMyZc*12ZR-{XG!|h`h!WK9m]G`<_E(?OG{Th{vYQ<KkKA93;&' );
define( 'AUTH_SALT',        'PYV3[jNbz):`K6KFiK(zA^)94D=5IzmNbf(*toGtWVl8%I*G&=3?+OgTa@S21[`/' );
define( 'SECURE_AUTH_SALT', '[c)e2c`UBY%hvT/wlMq4,g6,9^~f!psIl4_%X0Z%+SVmQKC&{?6~_ZCm4B[`R`J-' );
define( 'LOGGED_IN_SALT',   '4Y3G >-Rn<lFf5qQSJVKn=dj9u2Bs&2nxo$>t *6DaTRV}A7L>C.dd)fV{)_jkD>' );
define( 'NONCE_SALT',       'aU )=89!8<dF?c;E< zHsE%7gY%AW0X^5Yd&pS554}|YOpYW1dHSCN#e9L=C6(T_' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

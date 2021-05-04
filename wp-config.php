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
define( 'DB_NAME', 'angelora' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345@ASDfg' );

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
define( 'AUTH_KEY',         'k7>AMQ%2z779BHLl<B6vrOeHv(<%7PT,N_8 L;XTyHcOs3 H{/:H;WS#^]R6p/#_' );
define( 'SECURE_AUTH_KEY',  '6_Y2;!~Hm&<]$(2_;%WJhO0l0s/_nqIwriYBQ)Wlo*j49Hd@nUh9p(1Jvw%-(%J&' );
define( 'LOGGED_IN_KEY',    'yrwQkz@n.TFg72XZ-n6a&@Vl=ChOq]&e((+%K[6l|=siDBdS~w7CUJX]gT^hV;DW' );
define( 'NONCE_KEY',        ')rIvXdm;j5R= 7yP[L2rbor|buS0;(^UFEcn>[l!gYxU2@%/M1>^ZJ:?CuBQ-Ko&' );
define( 'AUTH_SALT',        'F!EQp*!*7%L*C):LTbd]V,pbG}{X1gaK#Wj+15r?jv4t`o5GL*&wy),ovg]yt.4,' );
define( 'SECURE_AUTH_SALT', '4(Y}W<GY~NChWkpo,t;<`D&oVbJ(Jd)y-Qc =$E4ts,X=H9P!2E#X6gO7-j]TJ+G' );
define( 'LOGGED_IN_SALT',   '!8S2>5f@)$zli(.hX_!!Y(eq=!^]d 1/+=}{ ~x^A@`zG0pyqS)bcB~mBAs]>y48' );
define( 'NONCE_SALT',       'r5LPD-ZU5)Rg`H0Plp{S6ECqkUj*<gBF?On6!r7#UY^^-T+6U_I~}HG%:9g30#(;' );

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

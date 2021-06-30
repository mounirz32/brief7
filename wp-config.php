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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '+d+UCB}4$v#FsWq+pRfgrQL`] iA!@;!FF%R sD6l1[K9UJ].{E[g4w=6+W  Qe+' );
define( 'SECURE_AUTH_KEY',  ',]8a,$5#[;*#a:%i0A<s.6E=c(,;$l4yLdmoKy,JLBBx6;m~U4!9=lBEOE(C5pg,' );
define( 'LOGGED_IN_KEY',    '^^?lTBYWtqx%}:APu(%EJ@-L]B7(|{b<>aN3J V>X@7;/z-[lEyP`Fvi-I8&v%hb' );
define( 'NONCE_KEY',        '%3H6KXYvrP*2$TfT#d8VUG@!`Zp.LHP39Y?/ FvWatDR(mWA/};><fDraSB|c^v~' );
define( 'AUTH_SALT',        'I[~q*rK!q3x2C~K/vv!0]Ja9~Qi*_BD*XU74wmm@yn2u; X:4ZrO$sn}]+Z#s/E-' );
define( 'SECURE_AUTH_SALT', '!c#)1pWW3TbDF@GlTXe/C8v&FF=v,MJK7Ohm*[{FZ=RrLF_In6PL|vZ.Of3%RGw@' );
define( 'LOGGED_IN_SALT',   'D.9/|f,S|?w@UYbR8zO1)vbvNO<.A6UvW~jfRk+ha,=S#.&E5gAWhHKt!`UX(v9r' );
define( 'NONCE_SALT',       '^eo$3V$9#DDK3*UFcKt`p #C$Wplz^BCFs<AAuQYU~!oI^bW{eKmI6?Cm88V1#^U' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

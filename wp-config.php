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
define( 'DB_NAME', 'eexam_db' );

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
define( 'AUTH_KEY',         '9>Hj{sSlp,a~pTC*V]rM/VSe)=Th?Zbpe1NNsx>`Z#G[jK[_J^!{#X$5Rqp{$cQy' );
define( 'SECURE_AUTH_KEY',  '!RLHdno8l5)|)B@57y|qF1xc+gaDO_q.>ZxSNx[cs@F8liQ+VW9kc7tfAY[YvGb8' );
define( 'LOGGED_IN_KEY',    '=qXM<5u6zdj]*-@Eb)(AV]xT<b,{-1Up:HXL,gYP.S`r$~OeYDhH2(kuKck-2EoT' );
define( 'NONCE_KEY',        'Z(l^5pJnPH`y&ZHc[j.#K3}|JB/QQAFy{pt}:nBXc=:QOE*sQ&|G>{&7{];0^>xt' );
define( 'AUTH_SALT',        '0|cB~Ao2]6Nu~);w`L:1#bCq^In&@LyiZ.]>Z^JAr_ ?(h# G$RdLSt/fLyeNo19' );
define( 'SECURE_AUTH_SALT', '<x$7&st0Wi,5$^H8oQJozY%~F{Z#8C&VZ0jsdMx9*FuQdf?_4V_?S]yB]<]9Vuhm' );
define( 'LOGGED_IN_SALT',   '-]jHf!azbKdzU}3l5errvjyxiyEtKI[@rdjlH;`32uFe?M+d3WyavYs!z_DT(0*g' );
define( 'NONCE_SALT',       'e*oTn-)HZ[;?S2$up.D%8a;~ZGF;h7$v6=R:jcu3[qNr^?9?Q(oOIH5L.Jc{!#m#' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

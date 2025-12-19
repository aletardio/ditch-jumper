<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbiu1mgnw14idi' );

/** Database username */
define( 'DB_USER', 'ujxcabgskridz' );

/** Database password */
define( 'DB_PASSWORD', '24gptw0suyir' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'VaBP7JZ)S&t#4)GBo`zFE}k~,l6q:J)~5AuJ+uIl?E/B857CS6Y`nCK6*0}!MEV2' );
define( 'SECURE_AUTH_KEY',   '3M,/n{(YdyANIJQL0U#=OI:194y?Xi4F-pX#Y_j>@{BW+ht#iM7+kQ(b$Fgrv&Qa' );
define( 'LOGGED_IN_KEY',     '<eBAykfM[,pJd9u}bnNy?)Y1gf-AM8`1X*/7q<6jKGu`8Ckqc^I W+SQJ*+E2KrP' );
define( 'NONCE_KEY',         'k3nx6z{?,x8CyI6],{g?Gq6;E4J7=<Ib V!|v/R4sW|Lz70Jk0>W7{Tv/KQTJ!,@' );
define( 'AUTH_SALT',         'dBqACKU,0{_1ubW%;y{9VjF`-s|gM:q+ej1aV~$hVbR#x2m.;Potm$VwTRIg{]ju' );
define( 'SECURE_AUTH_SALT',  'ORso64E5!;6kl|v|vU|$7*|A)SyJOGb<!`v `sK#|p2zPPZq~soKqY~NZly.U]h|' );
define( 'LOGGED_IN_SALT',    'fR7vgZ5(xzqEbU<5B`BJ8wNuGAK^nZ[l`o}hb4$]/r2Q?+#nRz`s)%c|Qx`!*&L5' );
define( 'NONCE_SALT',        '-Tgg CgLO=e/E4rYdc,h1)g6-l<B0+prYpp9e)Fpz<I]R&^F~=*!7;1CLR({qrm=' );
define( 'WP_CACHE_KEY_SALT', 'oQ:7/!T,]$mhsyEK94/vvO|FaqfZKWV<Tu 9-<N+6]J=x<}cIS6QA-+B%E&WPmSm' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ldr_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system

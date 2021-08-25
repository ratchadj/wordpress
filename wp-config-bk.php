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
define( 'DB_NAME', getenv('DB_NAME') );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'O5W<H?=Qg(YL8,=6(9Y!`I*)Pijo}2`]:%/Ktz{NiFb>a/plywsQ>a%76UM600L1' );
define( 'SECURE_AUTH_KEY',  ' k}q%?1vr)Y7Y!yDUMr,(ftVk2VrrzZ=zVWpv1>M,R)[rtc>k,Alb`-chU%g#le_' );
define( 'LOGGED_IN_KEY',    ',av!-xPn]]@R`}yPU#Jtm-.Rb57Ux52e<A@bCyXy:D;x*_z|xNsmgR;CEKM],jd#' );
define( 'NONCE_KEY',        'Tef$6vLYuHnzi,_Wm#>6;)GhCEYLL3ujNf{_Na79e{}}Fz>0}Sll,ot_,/Piur7F' );
define( 'AUTH_SALT',        'kL<@CrOj#MmD(m%*Kqh13@n*[nh!7ZO+B ^h8AN?6d}Ho#Lxi#HyGmc.aE:Yn-m_' );
define( 'SECURE_AUTH_SALT', '(`bY)du3$s51A.K+RQ?a 1lp-pm+w` +({WE!Qc(b]idZ]djJdq%gGafJ*B4vpUY' );
define( 'LOGGED_IN_SALT',   '*t0/KT3rBh9DHUnSw<nHm~FXDs|AT-Z >>u5Ygw[?ESfHk=WVyS!3)=5B}-I6*rn' );
define( 'NONCE_SALT',       'ikzSTi-o?^Yv[SVBQaRDB)C}u~~Xvs~=R4o[qO5O3D?u>A_|)QKw>XzV6`<YEp_A' );

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
define( 'WP_DEBUG_DISPLAY', false );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

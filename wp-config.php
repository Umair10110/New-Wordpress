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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newWordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$H~RTQ=b:6r1+@ngDrP/_60(=zSY)CYSzZDk)11KUGH2JSOYT$KW6m1y;nZZ;Hf&' );
define( 'SECURE_AUTH_KEY',  '%1MqQGQqUL~2wTn2xno}R:mqb{5EZ092#UEky5RI-[bWSLyg-w-ALYq K@#LsB1|' );
define( 'LOGGED_IN_KEY',    '?#{xD5Mys}_PgiHuM^fV8X,;k~TL+}Yy<.M+c@&vZWKh2g6/)n0BuQ>J$*S!]2cV' );
define( 'NONCE_KEY',        '/oPN|Zjy1:NF|4<cf$g|J-mT%65/-VCs}oIYd<k2X<(CZKPbWSwVfwdF|ZFWaD3n' );
define( 'AUTH_SALT',        'I#z>[#`FXnFtHS)Z};$N*Xij= HW9(hXYZ/;{ ~MhEI_4$uOIiBH&@SPV<}f`@)R' );
define( 'SECURE_AUTH_SALT', 'u$YS_v@_$Al/.+auZFG;<:92tOL;@zl8M=zy,ZA>g!o(+YdB$+a5= aJl:v9UVi$' );
define( 'LOGGED_IN_SALT',   'L}K%TwRkwMo4}Meh_X^^76G~r828UG,`ZaF:b=hw qoxre<,BAoULEk[5!GUl]Sw' );
define( 'NONCE_SALT',       '2RFF31L@y% ].ZN,d-v1%O&YXdwV7Y,PwOia[.e =U ;x7Y@e31E^5+/HK2JjS1z' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
define( 'DB_NAME', 'bukucerita' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'C8Nf^s9ER}&n`Gd]&FHkI~ R@`x+/Z[LGI+W]v/Z6nJ^ny<[)U]_%@%#fWU6ajYQ' );
define( 'SECURE_AUTH_KEY',  '%4-Q|3Tneg*l1[~cA!E&XJa>0sl20Mh&D;D9^pq}`5Z@(w j?MJ/->xlOPq=LVY]' );
define( 'LOGGED_IN_KEY',    '&}+7=X:C1[;XRJrPU!%FMr&q1c]V, sQ{Z<XRj_Oq7OFVYmnI2/9FsRBmie3pYL=' );
define( 'NONCE_KEY',        'Q-yO26tVmbmHJ?AyWhgF}x_)gTpAI)>}WzTo^!$R~1A)idi~,}r61,ItQ!FA3h6I' );
define( 'AUTH_SALT',        '?cGbl1R%`zcW^*,DhA!8 %E,[Lss}<Qk8w4*.Ln;zm6w%lyUX!--S8XjKZv~1Tt=' );
define( 'SECURE_AUTH_SALT', '|z1Tu5%W*}_=uy7^WA(<;$5-CBjt^!T)l)kDl&<K1IaF@AU =?C#H26XO[k4aD-s' );
define( 'LOGGED_IN_SALT',   'B8Q1:2QbQJ0hpkf;ey/$(Wb7L@%i4yV8wA}<W`RM&;,K{#XhW..ycI{t43fg_4ra' );
define( 'NONCE_SALT',       'x*HZ`WOKn-% 8V@>$1)aJ=%F:vS&]g*pl~a/]R]Ev*en1c%bv*rx,u+Jx ^yHc_K' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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

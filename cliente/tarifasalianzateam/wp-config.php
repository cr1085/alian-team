<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u644490110_Hwz2d' );

/** Database username */
define( 'DB_USER', 'u644490110_zWkmQ' );

/** Database password */
define( 'DB_PASSWORD', 'c9wSxc6ZZm' );

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
define( 'AUTH_KEY',          'L.G/%xV+X5|_X*[elveUu6JYm$/1#8WKgO.Z.Z2>b/2=K^YSK!G:R*SM*-SV?j8{' );
define( 'SECURE_AUTH_KEY',   'U&7MKZ7flm30q<Ft9[xvH&eFeRGy-[/&YGyiD{lQHh*J$dO9^wM( D@4Xi0%;7<<' );
define( 'LOGGED_IN_KEY',     'dtq;.!l$%j10`xRb(|+ELu/dGDTJ@u$Aj}RQR22n1/?2]%SaQAjNMv%FEkq{U:k5' );
define( 'NONCE_KEY',         'm&XDe[!|x>d4Cq|kRITn3Yh34tfM<%]b54}O~z=hYybIPFwA`4Is(BT1jg,TD0kD' );
define( 'AUTH_SALT',         'Qd/q&B.j^Mz65IW5LV&p?loc$Sac+}Y@]VYQ%u5M#I/#4U?jLyZ$qYa|yh?M$EZA' );
define( 'SECURE_AUTH_SALT',  '<Ag>0zW(a8:e4k|!p/?]5bU=!]A+.`4?}<|iq]lNM+~WVB>-B9s[/Na76Xf_iALs' );
define( 'LOGGED_IN_SALT',    '7?|P7~N%S{4m! qca=~v`YHmgj.An,_G;Tng=N:2>L3SV#fPAuS{D.Yw EhlAy%2' );
define( 'NONCE_SALT',        't2}31;i+}8^7O6n)sZ#bZ9JHC`$d2dgd<+s$b#ECe0Qo>2c;6}meq+VDd4Mi<aN+' );
define( 'WP_CACHE_KEY_SALT', 'r< 5YppDRTG$<3vTK]!kauEXQ)Xr `WTwab,itv+b}jL14huk1uM^68gS_]<&7:u' );


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



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

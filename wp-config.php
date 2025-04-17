<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testwebsite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'bkzspfbr' );

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
define( 'AUTH_KEY',         'nz2eF{Pf =^A _UIm/;)n,]?]1=DKqki1ehpc%1.>(3~u1Jed2Dcy>1w%Sg8oNjG' );
define( 'SECURE_AUTH_KEY',  'm#)5LU#D4C}8!VzyHNY;M!hm@vZsPrXXT~{x42H0X$*KTR%ko9D55nc#7}wC/9qt' );
define( 'LOGGED_IN_KEY',    '5[OK3+8w0kw<pf9 liq&G_f;[(*(aTwLoh@R1<>H6a~Kyc.Xy,Z!{1V/u_c0?=2A' );
define( 'NONCE_KEY',        '43-Jsc;fSrnczfAU,nS)&Nwr}55/};!^|c+a+*{s#7@~kgt}4k5ycbD{1|x:x/:<' );
define( 'AUTH_SALT',        'TL.6eecH|SB Zk@?L0acVT&i?HHU 7Zn)134_}Vk~,{rm=2%M[Roy+{y0Gqx0R=Y' );
define( 'SECURE_AUTH_SALT', '$tlXf~rC(wl*fk{r%-b;-8{@C9AM@c; Zw*GM;YI#Mbl?zJ]/Qd],vUggBhgTAlE' );
define( 'LOGGED_IN_SALT',   'PD@XTU)0YbQhJxxwb.0:WrF;EnX,8FU-^NBrP5m18}l>t_apSRiez+hvdF-BYAMZ' );
define( 'NONCE_SALT',       '_r?~`Bq@+Fbhqw2F^z[UP!^{W>e%z%4ZJKWkPS|?>4$6qfbdv-_L*p)N|qew,JKD' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

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
define( 'DB_NAME', 'thaodienpm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         'Ja|ubWs,%MpqF|C. Y/4rM!4-DPo#%DLPbth./Yd<L(*-Has*Dq,pij%<gtE!,Ks' );
define( 'SECURE_AUTH_KEY',  'DzhKtdbLU>eEFQf9e3yxJG}JFry6CXJkS)|VvgDzNpawYX-q}t]xD3%~Po8&>`!?' );
define( 'LOGGED_IN_KEY',    'SGdq<9:V%xtF6PG8 sW[=,R!tCHjV_^Z)D:_a,o6ErYCm|WRv?I+1Sl~uf#2N5pu' );
define( 'NONCE_KEY',        'Q}2FQ2w!j`;mE#L?6?U)pkp zJ87UG|UXa6aWObdlr;{b8]Wmb-.]2ZgX] Q3{Ab' );
define( 'AUTH_SALT',        'uF24do)]VnW==Dmwn/j4CsPy#B^@!?&^zjaq!VC7Lp:TxVzz[bM5WWfp4aZe6?%k' );
define( 'SECURE_AUTH_SALT', ';=?U$44-*|E8`XNnZ5GCpU79`59RyF;EhaZE{j>*PGc0,bE8P5(~u^HOlOU*vwx(' );
define( 'LOGGED_IN_SALT',   '7;eHxWe,]MN^>#(hw#3q/?Z0ER][d]]p^AMI@Zi*rN)GM1iYjq>TEzRGw-9@?`*S' );
define( 'NONCE_SALT',       'q8WD7zWSb}K:3:(0{9i.LozXr+j:^oNH70?$!B=1]uyynzs6Zk0i/L0t%XxVJi2m' );

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

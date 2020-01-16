<?php

/** Enable W3 Total Cache */

define( 'WP_CACHE', true ); // Added by W3 Total Cache


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

define( 'DB_NAME', "theme" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'D<CO*1Et&h@L!r*!Ok{D)ba ./?Wgl3,LDUS#9}9tr<YX&wg6Z+u5`J#y$qJ$NLl' );

define( 'SECURE_AUTH_KEY',  'U=BA?u@)kPEb&K#ANs^%fv7M,j`jrf4wCob;2$nKFY50L=S+DPM5N9R;.Ecai3&H' );

define( 'LOGGED_IN_KEY',    'al(lO/:=,&$CU%LwJ>d7*&8D]l%=9k/.U$v]Y+jLB#(7Nd~yW%9Y?>JMO!<i2f@S' );

define( 'NONCE_KEY',        'Z2[N+L<krmbD4KjpMG9n!Bci 38~ndt?{neMz%<^s4FF8UAO:[c[#E0}C6`W(rf7' );

define( 'AUTH_SALT',        '16DEm<&?sX?BF4Q#SXfZ9DAyI`r1?_rkbdl+~5vz~%sn$)r2b4$ygRXEy/ar.`~G' );

define( 'SECURE_AUTH_SALT', '3l L:Qhq^q]OXgV_$@dIKU_XBIPL#-z/{SxYzpJm0}-AKQ+4]7dhr<0O}@#O3)xv' );

define( 'LOGGED_IN_SALT',   't5/E|;JZB7qNlp}d<0DUg=qzD/]4Hbj#%;v*@5)@1;Y[qBV)Ti&iDV{iSU2BWJo5' );

define( 'NONCE_SALT',       'u_aN&Kh_BiYbpm>Y)h.Obx3G5LO-(]eL5nZVjA*n[q8Me&|)]YD#xHUkbvE~S,2f' );


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


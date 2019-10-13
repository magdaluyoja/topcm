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
define( 'DB_NAME', 'topcm' );

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
define( 'AUTH_KEY',         'KF*.wo?FDf#f7VWJy9^zSLx7opG6$5Ty8I3YIyl%?F9FmeYB3Qj0p@<dx/WQzHhV' );
define( 'SECURE_AUTH_KEY',  '^{9s(}RfUnqlzkE)5Z#^vSu-%d:I]Z]i+-gu&60RA|[.#1Ud/WYzHBmF]&Er6?``' );
define( 'LOGGED_IN_KEY',    'w<^c]QJC:o*P)PpWKd:!myJ`9mw2tb$5uCL@8jzEnTGq%rSCS)i!*^f5h?,XlNf6' );
define( 'NONCE_KEY',        '-w(|o)O.a-T=oNMKc5=+N-lqU$2_xw&nq^7BnTA+f)O9Zf;^xL;gDn5-bA=Jm~{]' );
define( 'AUTH_SALT',        'bDgKvi.HlH|lOPNR9Af>Aop%tu:d3MlC9qj<]&ps6A9ePUV#Ff )C)o(cD7v#Bo ' );
define( 'SECURE_AUTH_SALT', 'nh)t?dL^9H{TH|d|;kP/T4QX]BWf#0P4NhC<4o^%f1){A;]yyZizNS1?jl_VJ6MF' );
define( 'LOGGED_IN_SALT',   '~iAd5H+M7Rzfcd/BmD/<qZn5YYMgTSL*<BK VlgTRC%,S}R@;I%:ik~s%$A,JMS^' );
define( 'NONCE_SALT',       'rR{lNFjMG>j6V#,0|IkBe!rCC;Hhz$vi?./FSYSps%2T9AD59{t@wGuJ{JmC`t2J' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'topcm_';

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

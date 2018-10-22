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
define('DB_NAME', 'watches');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WUnCpT?NjGVJAdpb;p^]BX{}WLh#3ZZUE>|<(Lr`Q#&f@5LZ%^c[`PMAVH{IbOHS');
define('SECURE_AUTH_KEY',  'rO wmsYit`1aW4}l?U~eUABv &cCB$P12Fu%LKIY?qd1e#%P/-e%qVX)6=B5Egx)');
define('LOGGED_IN_KEY',    'uTd&:IkYV`aO/v4CtS*p1sG(kx7mHj4>RK:/>-RCDE<NpE~9xkqFk{V9ifnFWD`9');
define('NONCE_KEY',        '@`;i_D1P.ctKj<48y+*?xkDC[_X/I1m^k}u5D0mtFsPI&Hm{e|*G6)T4DIXCnuTI');
define('AUTH_SALT',        '3qWTDrnH7],@7Ukoov`74KBm2/{s=r]8k/9I>!tbrxq$[qgs$R@,JR7_.S6z,C9$');
define('SECURE_AUTH_SALT', '2=_tZE*Qq#dZ;>.+3Th*FdPOKsE=ZC>u/)LQsWZCO3(SvTrwk]I`Kgh651b.vk[Q');
define('LOGGED_IN_SALT',   'r1@rWeY_!%3=p`q; M*G>*.)0k1}Kt2+Fjh00Bi^mXPZ+#~O{>JE;VP>4}j_~okU');
define('NONCE_SALT',       'Mw,*BBOAe]%ud&L>&DXFspRsjI;DLQya&%25}wMu9i`7JLa19@Dgw|^4bU,,:;l5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

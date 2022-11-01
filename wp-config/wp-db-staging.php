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

define('DB_NAME', 'digimarma-staging-3131353ec0');
define('DB_USER', 'digimarma-staging-3131353ec0');
define('DB_PASSWORD', 'DgURipc_FhjhFRy38VAJTfL4G.ZCD!H92FQU@9XhGgMYypus3g');
define('DB_HOST', 'shareddb-p.hosting.stackcp.net');
define('WP_DEBUG', false);

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RLwYkXP40k/yCikrFaXldcF/wJJQmL4iJKOvcoxdsw0zsmFnBZ3LjuQu8vC/5BVTMV8mmx37TVQaNF2k/O19dA==');
define('SECURE_AUTH_KEY',  'tHYgv+/SooSCug6txhvrFFGL9I7VnX//ADYvqjl3MDQQQqXTmRlTISiiwQZX4U/keEBUI9mPRcmxSokpBcVuOg==');
define('LOGGED_IN_KEY',    'RR0ePMdW+aawiFbhmpPqpsZSF/n4QIbmGlhPXgeRBwxxTtGFANNRgVBi4ivysB7QggyBhagxhI2E9T6KbF2i5g==');
define('NONCE_KEY',        'IZ0ITE7XkI9d8ALosuti+UgvaXQ7idSPfFLWvO6FPyo3vCnVYNYPOl9qBBC8GqaIZ27j7xGO9808yXtZaWE7Cw==');
define('AUTH_SALT',        'GPa4GEGdfAGPqPZkqhJHYgSQTrth+0bz0wb45QNappj2zSsKcqmDBEQshqc0IfQKahfd3ROraU0WsUbiktGBCQ==');
define('SECURE_AUTH_SALT', 'Rq/KVFd3bjSCkGfE0iMXZny97U7Vop2ZS/ywz+ETc6WYd1jqMSCozhbxKj9ZYlNFjCj1GagI6hhk77F6nXgnag==');
define('LOGGED_IN_SALT',   'HlS+FsuRrQZtqg7ypCRrvBK3/+6TjY5pmwb6yHALr7kWZzlEOSlhJ05jM7md8SJJCjpMDJ8baI2y2Ao3pSGbTw==');
define('NONCE_SALT',       'h2zXQg/vsiKQ7GhuhnQpufZbJJZLiUwi88rpPposbT+JHGpO23SRhRmRRUJfBjdD4Nyhk+WmESxiVMDXusM3Wg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '9c_';

/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
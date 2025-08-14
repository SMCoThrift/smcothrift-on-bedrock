<?php

/**
 * Configuration overrides for WP_ENV === 'development'
 */

use Roots\WPConfig\Config;

use function Env\env;

Config::define('SAVEQUERIES', true);
Config::define('WP_DEBUG', true);
Config::define('WP_DEBUG_DISPLAY', true);
Config::define('WP_DEBUG_LOG', env('WP_DEBUG_LOG') ?? true);
Config::define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
Config::define('SCRIPT_DEBUG', true);
Config::define('DISALLOW_INDEXING', true);
Config::define('REMOTE_UPLOADS_URL', env('REMOTE_UPLOADS_URL') ?? false);

ini_set('display_errors', '1');

// Enable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', false);


/**
 * Redirects wp-content/uploads URLs to the production server in local environments.
 */
add_filter( 'upload_dir', function( $dirs ) {
	if( REMOTE_UPLOADS_URL )
		$dirs['baseurl'] = REMOTE_UPLOADS_URL; // 'https://example.com/wp-content/uploads';
  return $dirs;
} );

<?php

/**
 * Configuration overrides for WP_ENV === 'production'
 */

use Roots\WPConfig\Config;

use function Env\env;

Config::define('WP_DEBUG', env('WP_DEBUG') ?? false);
Config::define('WP_DEBUG_DISPLAY', env('WP_DEBUG_DISPLAY') ?? false);
Config::define('WP_DEBUG_LOG', env('WP_DEBUG_LOG') ?? true);

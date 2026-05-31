<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('FORT_THEME_VERSION', '1.0.0');
define('FORT_THEME_DIR', get_template_directory());
define('FORT_THEME_URI', get_template_directory_uri());
define('FORT_THEME_ASSETS_URI', FORT_THEME_URI . '/assets');
define('FORT_THEME_CSS_URI', FORT_THEME_ASSETS_URI . '/css');
define('FORT_THEME_JS_URI', FORT_THEME_ASSETS_URI . '/js');
define('FORT_THEME_IMG_URI', FORT_THEME_ASSETS_URI . '/images');

define('FORT_CACHE_DURATION_SHORT', 3600);
define('FORT_CACHE_DURATION_LONG', 86400);
define('FORT_POSTS_PER_PAGE', 12);

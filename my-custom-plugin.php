<?php
/**
 * Plugin Name:     My Custom Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Modernized enterprise-pattern WP plugin for portfolio/demo
 * Author:          Your Name
 * Author URI:      YOUR SITE HERE
 * Text Domain:     my-custom-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         My_Custom_Plugin
 */

// Your code starts here.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use MyCustomPlugin\Plugin;

define( 'MYCUSTOMPLUGIN_VERSION', '0.1.0' );
define( 'MYCUSTOMPLUGIN_PATH', plugin_dir_path( __FILE__ ) );

add_action(
	'plugins_loaded',
	function () {
		Plugin::instance()->boot();
	}
);

<?php
/**
 * Core plugin bootstrap.
 *
 * @package MyCustomPlugin
 */

namespace MyCustomPlugin;

use MyCustomPlugin\Admin\SettingsPage;
use MyCustomPlugin\Rest\CustomEndpoint;
use MyCustomPlugin\Cron\ScheduledTask;

/**
 * Singleton bootstrap for the plugin.
 */
final class Plugin {

	/**
	 * Singleton instance.
	 *
	 * @var Plugin|null
	 */
	private static ?Plugin $instance = null;

	/**
	 * Get the singleton instance.
	 *
	 * @return Plugin
	 */
	public static function instance(): Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Private constructor to enforce singleton pattern.
	 */
	private function __construct() {}

	/**
	 * Boot the plugin by registering all components.
	 *
	 * @return void
	 */
	public function boot(): void {
		( new SettingsPage() )->register();
		( new CustomEndpoint() )->register();
		( new ScheduledTask() )->register();
	}
}

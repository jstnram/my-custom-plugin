<?php

namespace MyCustomPlugin;

use MyCustomPlugin\Admin\SettingsPage;
use MyCustomPlugin\Rest\CustomEndpoint;
use MyCustomPlugin\Cron\ScheduledTask;

final class Plugin
{
    private static ?Plugin $instance = null;

    public static function instance(): Plugin
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}

    public function boot(): void
    {
        (new SettingsPage())->register();
        (new CustomEndpoint())->register();
        (new ScheduledTask())->register();
    }
}

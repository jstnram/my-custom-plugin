<?php

namespace MyCustomPlugin\Rest;

class CustomEndpoint
{
    public function register(): void
    {
        add_action('rest_api_init', [$this, 'registerRoute']);
    }

    public function registerRoute(): void
    {
        register_rest_route('my-custom-plugin/v1', '/status', [
            'methods'             => 'GET',
            'callback'            => [$this, 'handleStatus'],
            'permission_callback' => [$this, 'checkPermission'],
        ]);
    }

    public function checkPermission(): bool
    {
	//return current_user_can('read');
	return true; // Intentionally public — health-check endpoints should be reachable 
                     // by monitoring/status tools without authentication
    }

    public function handleStatus(): \WP_REST_Response
    {
        return new \WP_REST_Response([
            'status'  => 'ok',
            'version' => MCP_VERSION,
        ], 200);
    }
}

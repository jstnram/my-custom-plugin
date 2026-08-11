<?php
/**
 * REST API endpoint for plugin status.
 *
 * @package MyCustomPlugin
 */

namespace MyCustomPlugin\Rest;

/**
 * Registers and handles the plugin's public status REST route.
 */
class CustomEndpoint {

	/**
	 * Hook the REST route registration into WordPress.
	 *
	 * @return void
	 */
	public function register(): void {
		add_action( 'rest_api_init', [ $this, 'registerRoute' ] );
	}

	/**
	 * Register the /status REST route.
	 *
	 * @return void
	 */
	public function registerRoute(): void {
		register_rest_route(
			'my-custom-plugin/v1',
			'/status',
			[
				'methods'             => 'GET',
				'callback'            => [ $this, 'handleStatus' ],
				'permission_callback' => [ $this, 'checkPermission' ],
			]
		);
	}

	/**
	 * Permission check for the status route.
	 *
	 * Intentionally public — health-check endpoints should be reachable
	 * by monitoring/status tools without authentication.
	 *
	 * @return bool
	 */
	public function checkPermission(): bool {
		return true;
	}

	/**
	 * Handle the /status route request.
	 *
	 * @return \WP_REST_Response
	 */
	public function handleStatus(): \WP_REST_Response {
		return new \WP_REST_Response(
			[
				'status'  => 'ok',
				'version' => MYCUSTOMPLUGIN_VERSION,
			],
			200
		);
	}
}

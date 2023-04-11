<?php

namespace Vcian\LaravelIpGateway;

use Illuminate\Support\ServiceProvider;
use Vcian\LaravelIpGateway\Middleware\IpGatewayMiddleware;

/**
 * Class IpGatewayProvider
 *
 * @package LaravelIpGateway
 */
class IpGatewayProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];

        if (config('ip-gateway')) {
            foreach (config('ip-gateway.Middleware') as $middlewareName) {
                $router->pushMiddlewareToGroup($middlewareName, IpGatewayMiddleware::class);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
    }

    /**
     * Publish files
     */
    public function publishFiles()
    {
        $publishableFiles = [
            __DIR__ . '/../publishable/config/ip-gateway.php' => config_path('ip-gateway.php'),
        ];

        foreach ($publishableFiles as $storedPath => $publishPath) {
            $this->publishes([$storedPath => $publishPath]);
        }

    }
}

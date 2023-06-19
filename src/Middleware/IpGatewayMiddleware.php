<?php

namespace Vcian\LaravelIpGateway\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

/**
 * Class IpGatewayMiddleware
 *
 * @package LaravelIpGateway\Middleware
 */
class IpGatewayMiddleware
{
    /**
     * @var
     */
    protected $ipList;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $prohibitRequest = false;
        $getClientIps = $request->getClientIps();
        $enableBlacklist = config('ip-gateway.enable_blacklist') === true;
        $redirectRoute = config('ip-gateway.redirect_route_to');

        if (config('ip-gateway') && config('ip-gateway.enable_package') === true) {
            foreach ($getClientIps as $ip) {
                if ($enableBlacklist && $this->grantIpAddress($ip)) {
                    $prohibitRequest = true;
                    Log::warning($ip . ' IP address has tried to access.');
                } elseif (!$enableBlacklist && !$this->grantIpAddress($ip)) {
                    $prohibitRequest = true;
                    Log::warning($ip . ' IP address has tried to access.');
                }
            }
        }

        if ($prohibitRequest) {
            return redirect($redirectRoute != '' ? $redirectRoute : '/404');
        }

        return $next($request);
    }

    /**
     * Grant IP address
     *
     * @param string $ip
     * @return bool
     */
    protected function grantIpAddress(string $ip) : bool
    {
        $this->ipList = config('ip-gateway.ip-list');
        return in_array($ip, $this->ipList);
    }
}

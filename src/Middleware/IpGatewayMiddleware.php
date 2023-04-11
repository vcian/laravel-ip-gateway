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
        if (config('ip-gateway')
            && config('ip-gateway.enable_package') === true
        ) {
            if (config('ip-gateway.enable_blacklist') === true) { // Its check blacklisted ip-addresses from ip-config file.
                foreach ($request->getClientIps() as $ip) {
                    if ($this->grantIpAddress($ip)) {
                        $prohibitRequest = true;
                        Log::warning($ip . ' IP address has tried to access.');
                    }
                }
            }

            if (config('ip-gateway.enable_blacklist') === false) { // Its check whitelisted ip-addresses from ip-config file.
                foreach ($request->getClientIps() as $ip) {
                    if (!$this->grantIpAddress($ip)) {
                        $prohibitRequest = true;
                        Log::warning($ip . ' IP address has tried to access.');
                    }
                }
            }
        }

        if ($prohibitRequest === false) {
            return $next($request);
        } else {
            if (config('ip-gateway.redirect_route_to') != '') {
                return redirect(config('ip-gateway.redirect_route_to'));
            } else {
                return redirect('/404');
            }
        }
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

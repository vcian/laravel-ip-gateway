<?php

return [
    /*
     * Enable / disable package
     *
     * @type boolean
     */
    'enable_package' => true,

    /*
     * Enable / disable firewall
     *
     * Enable will block Blacklist IP
     * Disable will allow only Whitelist IP
     *
     * @type boolean
     */
    'enable_blacklist' => true,

    /*
     * Enable IP detection for Middleware
     *
     * You can use Middleware name like 'auth','web','api'
     *
     * @var array
     */
    'middleware' => [
        'web' // Default Middleware Group
    ],

    /*
     *  Url to redirect if blocked
     *
     * You can use route url (/404);
     *
     * @type string
     */
    'redirect_route_to' => '',

    /*
     * Whitelisted and blacklisted IP addresses
     *
     *  Examples of IP address
     *      '127.0.0.1',
     *
     * @type array
     */
    'ip-list' => [

    ],
];

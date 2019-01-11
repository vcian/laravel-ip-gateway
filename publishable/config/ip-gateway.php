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
     * Enable IP detection for middleware
     *
     * You can use middleware name ('auth')
     *
     * @var array
     */
    'middleware' => [

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
     *      '127.0.0.0',
     *
     * @type array
     */
    'ip-list' => [

    ],
];

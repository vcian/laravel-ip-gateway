# IP gateway for laravel

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=for-the-badge)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/vcian/laravel-ip-gateway?style=for-the-badge)](https://packagist.org/packages/vcian/laravel-ip-gateway)

## Features

*  The Laravel Ip gateway package helps you to blacklist or whitelist IP to prevent unauthorized access to your application.

*  Since blacklists deny access to specific entities, they are best used when a limited number of items need to be denied access.
When most entities need to be denied access, a whitelist approach is more efficient.

## Requirements

PHP ^8.0

## Installation

You can install the package via composer:

```bash
composer require vcian/laravel-ip-gateway
```

After installation, You need to publish the config file for this package. This will add the file `config/ip-gateway.php`, where you can configure this package.

```bash
php artisan vendor:publish
```

### Config Usage (`ip-gateway.php`)

* `enable_package` is used for enable/disable access protection.

* `enable_blacklist` when its true that means, It will denied access for registered ips in `ip-list`, false means, It will allow accessing for registered ips in `ip-list`.

*  You can authenticated IPs through register route groups in `middleware`.  

* `redirect_route_to` will access URL, To redirect if denied.

*  You can define all your whitelist or blacklist IP addresses inside `ip-list`.

*  If you want to add IP gateway middleware in you custom middleware group then just define your custom middleware group inside `middleware`
### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email ruchit.patel@viitor.cloud instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Notes

**You can create as many whitelists or blacklist groups as you wish to protect access**

# Access Laravel Pulse data using API

This package provides the very same information from [Laravel Pulse](https://pulse.laravel.com) as a JSON api endpoint.

## Installation

You can install the package via composer:

```shell
composer require robertogallea/pulse-api
```

## Usage

The package adds api endpoints to your application that exposes metrics collected by Pulse.

- `/api/pulse` - Provides the full set of metrics collected by Pulse
- `/api/pulse/{$type}` - Provides the metrics from a single type

By default, the available types are the one provided by Pulse itself:

- `servers`
- `usage`
- `queues`
- `cache`
- `slow_queries`
- `exceptions`
- `slow_requests`
- `slow_jobs`
- `slow_outgoing_requests`

However, you can integrate your own by mimicking any Pulse card or by your own implementation.

## Configuration

The file `config/pulse-api.php` defines the configuration and can be customized after publishing the package Service 
Provider.

```shell
php artisan vendor:publish --tag=pulse-api-config
```
### Access to endpoints

The endpoint is allowed according to the logic defined by the middlewares defined in the `middleware` section of the 
config. By default, the following apply:

```php
'middleware' => [
    'api',
    Authorize::class, // the default Pulse middleware
],
```

### Custom resources

Like in the web version of Pulse you can add your _Cards_, in PulseAPI you can add your own _Resources_, you can 
integrate the default ones by editing the `resources` configuration section:
```php
'resources' =>
    \Robertogallea\PulseApi\Services\PulseAPI::getDefaultResources()->merge([
        // Add your custom resources
    ]),
```

### Including recorders configuration in json response

Laravel Pulse cards use configuration to adjust the rendering of the card view. This may be not required or not useful in
api but is enabled by default.
You can disable the configuration exposure by proper setting of the `include-config` configuration key to `false`:

```php
'include_config' => env('PULSE_API_INCLUDE_CONFIG', true),
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [Roberto Gallea](https://github.com/robertogallea)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
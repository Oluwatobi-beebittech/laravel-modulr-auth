# Laravel Modulr Authentication Header
[![Latest Stable Version](http://poser.pugx.org/oluwatobiakanji/laravel-modulr-auth/v)](https://packagist.org/packages/oluwatobiakanji/laravel-modulr-auth)
[![License](http://poser.pugx.org/oluwatobiakanji/laravel-modulr-auth/license)](https://packagist.org/packages/oluwatobiakanji/laravel-modulr-auth)
[![Total Downloads](http://poser.pugx.org/oluwatobiakanji/laravel-modulr-auth/downloads)](https://packagist.org/packages/oluwatobiakanji/laravel-modulr-auth)
[![GitHub stars](https://img.shields.io/github/stars/Oluwatobi-beebittech/laravel-modulr-auth)](https://github.com/Oluwatobi-beebittech/laravel-modulr-auth/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/Oluwatobi-beebittech/laravel-modulr-auth)](https://github.com/Oluwatobi-beebittech/laravel-modulr-auth/network)

Laravel package to generate authentication headers for Modulr Finance

## Installation

[PHP](https://php.net) 8.0+ and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Modulr Auth, simply require it

```bash
composer require oluwatobiakanji/laravel-modulr-auth
```

Or add the following line to the require block of your `composer.json` file.

```
"oluwatobiakanji/laravel-modulr-auth": "^1.0.0"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

By default, the `ModulrAuthServiceProvider` service provider will get registered automatically in `config/app.php`. However, to manually register the serivce provider, add the following to the `providers` key.

```php
'providers' => [
    ...
    OluwatobiAkanji\ModulrAuth\ModulrAuthServiceProvider::class,
    ...
]
```

Also, register the Facade as:

```php
'aliases' => [
    ...
    'AuthHeader' => OluwatobiAkanji\ModulrAuth\Facades\AuthHeader::class,
    ...
]
```

## Configuration

The Laravel modulr auth package comes with a configuration file for the API key and secret provided by Modulr Finance. Also, the base URL and routes for accessing Modulr Finance (either sandbox or live) can be configured here.

>Publish Configuration as

```bash
php artisan vendor:publish --tag=modulr-config
```

A configuration-file named `modulr.php` will be placed in the`config` directory:

```php
<?php

return [
    
     /**
     * API key From Modulr
     *
     */
    'key' => env('MODULR_API_KEY'),

    /**
     * API secret From Modulr
     *
     */
    'secret' => env('MODULR_API_SECRET'),

    /**
     * Modulr API base url
     *
     */
    'base_url' => env('MODULR_BASE_URL', 'https://api-sandbox.modulrfinance.com'),

    /**
     * Modulr live base route
     *
     */
    'live_base_route' => env('MODULR_LIVE_BASE_ROUTE'),

    /**
     * Modulr sandbox base route
     *
     */
    'local_base_route' => env('MODULR_LOCAL_BASE_ROUTE', '/api-sandbox'),
];
```

Add the following environment variables to the `.env` file of the project

```env
MODULR_API_KEY=key_supplied_by_modulr_finance
MODULR_API_SECRET=secret_supplied_by_modulr_finance
MODULR_APP_BASE_URL=https://api-sandbox.modulrfinance.com
MODULR_LIVE_BASE_ROUTE=live_base_route_supplied_by_modulr_finance
MODULR_LOCAL_BASE_ROUTE=local_base_route_supplied_by_modulr_finance_sandbox
```

## Usage
The `AuthHeader` is to be accessed via the facade `OluwatobiAkanji\ModulrAuth\Facades\AuthHeader`.

In a class, import the facade as:
`use OluwatobiAkanji\ModulrAuth\Facades\AuthHeader`

Then use the facade to access these methods:
- `getHeaders` as `AuthHeader::getHeaders()` or `AuthHeader::getHeaders("nonce_value", "timestamp_value")`
- `setNonce` as `AuthHeader::setNonce("nonce_value")`
- `setTimestamp` as `AuthHeader::setTimestamp("timestamp_value")`

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Thanks!
Oluwatobi Akanji.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information

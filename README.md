# greenhouse
 greenhouse

## Installation

You can install the package via composer:

```bash
composer require terawatt/greenhouse
```

Add the service provider in your config/app.php file:

```bash
'providers' => [
    // ...
    Terawatt\Greenhouse\GreenhouseServiceProvider::class,
];
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --force --all
php artisan migrate
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
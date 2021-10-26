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
    App\Providers\FortifyServiceProvider::class,
    Terawatt\Greenhouse\GreenhouseServiceProvider::class,
];
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --force --all
php artisan migrate
```

You can publish and run the db seeder with:

```bash
php artisan db:seede --calss=GreenSeeder
php artisan db:seede --calss=DatasetsSeeder
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
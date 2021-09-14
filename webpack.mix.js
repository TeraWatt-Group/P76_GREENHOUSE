const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('src/resources/js/app.js', 'src/public/js/green.js')
    .sass('src/resources/sass/app.scss', 'src/public/css/green.css')
    .webpackConfig(require('./webpack.config'))
    .options({ processCssUrls: false });

if (mix.inProduction()) {
    mix.version();
}

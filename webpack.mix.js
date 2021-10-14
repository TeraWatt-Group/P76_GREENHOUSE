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
    // .js('src/resources/js/filepond.js', 'src/public/js')
    .sass('src/resources/sass/app.scss', 'src/public/css/green.css')
    .sass('src/resources/sass/filepond.scss', 'src/public/css')
    .copy('node_modules/filepond/dist/filepond.min.js', 'src/public/js/filepond.js')
    .webpackConfig(require('./webpack.config'))
    .options({ processCssUrls: false });

if (mix.inProduction()) {
    mix.version();
}

const mix = require('laravel-mix');
const path = require('path');

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

mix.options({
        terser: {
            terserOptions: {
                compress: {
                    drop_console: true,
                },
            },
        },
    })
    .setPublicPath('public')
    .js('resources/js/app.js', 'public/js/green.js')
    // .js('resources/js/filepond.js', 'src/public/js')
    .sass('resources/sass/app.scss', 'public/css/green.css')
    .sass('resources/sass/filepond.scss', 'public/css')
    .copy('node_modules/filepond/dist/filepond.min.js', 'public/js/filepond.js')
    .version()
    .webpackConfig({
        resolve: {
            symlinks: false,
            alias: {
                '@': path.resolve(__dirname, 'resources/js/'),
            },
        },
    });
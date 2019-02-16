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

mix.js('resources/js/dashboard/app.js', 'public/dashboard/js')
    .sass('resources/sass/dashboard/bundle.scss', 'public/dashboard/css')
    .extract(['vue','jquery']);
    // .js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/web/css');

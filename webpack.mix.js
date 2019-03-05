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

mix.js('resources/js/manage/app.js', 'public/manage/js')
    .sass('resources/sass/manage/bundle.scss', 'public/manage/css')
    .js('resources/js/website/app.js', 'public/web/js')
    .sass('resources/sass/website/app.scss', 'public/web/css')
    .extract(['vue','jquery']);

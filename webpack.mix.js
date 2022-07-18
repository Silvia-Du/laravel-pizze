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

mix.js('resources/js/backend.js', 'public/js/admin')
    .js('resources/js/frontend.js', 'public/js/front')
    .sass('resources/sass/admin/style.scss', 'public/css/admin')
    .sass('resources/sass/guest/style.scss', 'public/css/front');

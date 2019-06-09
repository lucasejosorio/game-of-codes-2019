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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/ride/show.js', 'public/js/ride')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/ride/show.scss', 'public/css/ride');
mix.browserSync('http://localhost:8000/');

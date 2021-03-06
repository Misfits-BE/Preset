let mix = require('laravel-mix');

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

mix // Laravel asset generator instance

    // Frontend asset generation
    .js('resources/assets/js/frontend.js', 'public/js')
    .sass('resources/assets/sass/frontend.scss', 'public/css');
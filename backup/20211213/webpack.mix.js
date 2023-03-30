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

// mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');
mix
    .js('resources/js/script.js', 'public/js/script.js')
    .styles([
    'resources/css/global.css',
    'resources/css/custom-header.css',
    'resources/css/custom-main-index.css',
    'resources/css/custom-main-sale.css',
    'resources/css/custom-main-condominium.css',
    'resources/css/custom-footer.css',
    'resources/css/responsive.css'
        ], 'public/css/style.css');

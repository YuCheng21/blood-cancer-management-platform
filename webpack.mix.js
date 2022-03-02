const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js').sourceMaps();
mix.sass('resources/scss/all.scss', 'public/css');
mix.copyDirectory('resources/js/pages', 'public/js/pages');
mix.copyDirectory('resources/img', 'public/img');

mix.copyDirectory('node_modules/chartjs-adapter-date-fns',
    'public/node_modules/chartjs-adapter-date-fns');
mix.copyDirectory('node_modules/@fancyapps',
    'public/node_modules/@fancyapps')

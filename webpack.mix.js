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

mix.sass('resources/scss/all.scss', 'public/css')
    .copyDirectory('resources/img',
        'public/img')
    .copyDirectory('resources/js',
        'public/js')
    .copyDirectory('node_modules/bootstrap',
        'public/node_modules/bootstrap')
    .copyDirectory('node_modules/jquery',
        'public/node_modules/jquery')
    .copyDirectory('node_modules/sweetalert2',
        'public/node_modules/sweetalert2')
    .copyDirectory('node_modules/axios',
        'public/node_modules/axios')
    .copyDirectory('node_modules/bootstrap-table',
        'public/node_modules/bootstrap-table')
    .copyDirectory('node_modules/chart.js',
        'public/node_modules/chart.js')
    .copyDirectory('node_modules/chartjs-adapter-date-fns',
        'public/node_modules/chartjs-adapter-date-fns')
    .copyDirectory('node_modules/@fancyapps',
        'public/node_modules/@fancyapps');

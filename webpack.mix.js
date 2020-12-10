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
   .js('resources/js/main.js', 'public/js')
   .js('resources/js/jquery.min.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/lte.scss', 'public/css')
    .copy('resources/js/slick.min.js', 'public/js')
    .copy('resources/font', 'public/font')
    .copy('node_modules/@fortawesome', 'public/font')
    .options({
        processCssUrls: false
    });

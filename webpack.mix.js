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

mix.js('resources/js/app.js', 'public/assets/js')
    .js('resources/js/site.js', 'public/assets/js')
    .js('resources/js/auth.js', 'public/assets/js')

    .sass('resources/sass/app.scss', 'public/assets/css')
    .sass('resources/sass/auth.scss', 'public/assets/css')
    .sass('resources/sass/site.scss', 'public/assets/css')

    .css('resources/css/app.css', 'public/assets/css')
    .css('resources/css/auth.css', 'public/assets/css')
    .css('resources/css/site.css', 'public/assets/css')
    .autoload({
        jquery: ['$', 'jQuery', 'window.jQuery']
    }).sourceMaps();

if (mix.inProduction()) {
    mix.version();
}

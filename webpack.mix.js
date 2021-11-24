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

mix.js('resources/js/admin.js', 'public/js/admin')
    .sass('resources/sass/admin/admin.scss', 'public/css/admin')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/theme/theme_directions/ar_app.scss', 'public/css')
    .sass('resources/sass/theme/theme_directions/en_app.scss', 'public/css')
    .sourceMaps(true, 'source-map')
    .version();

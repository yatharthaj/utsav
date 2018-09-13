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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
// mix.less('resources/assets/less/bootstrap.less', 'public/css/theme-default')
//     .less('resources/assets/less/materialadmin.less', 'public/css/theme-default')
//     .less('resources/assets/less/materialadmin_demo.less', 'public/css/theme-default')
//     .less('resources/assets/less/shared/themes/theme-default.less', 'public/css/theme-default');
mix.sass('resources/assets/scss/bootstrap.scss', 'public/assets/css')
    .sass('resources/assets/scss/main.scss', 'public/assets/css');
    // .sass('resources/assets/scss/theme-v1.scss', 'public/assets/css')
    // .sass('resources/assets/scss/theme-v2.scss', 'public/assets/css')
    // .sass('resources/assets/scss/theme-v3.scss', 'public/assets/css');
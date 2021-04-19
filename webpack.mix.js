let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
.js('resources/js/app.js', 'public/js/')
.extract(['lodash', 'axios', 'jquery', 'bootstrap', 'popper.js'])
.sourceMaps()
.sass('resources/scss/app.scss', 'public/css/')
.sass('resources/scss/login.scss', 'public/css/')
.sass('resources/scss/error.scss', 'public/css')
.css('node_modules/normalize.css/normalize.css', 'public/css')
.browserSync('myapp.loc');

if (mix.inProduction()) {
    mix.version();
}

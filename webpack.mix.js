let mix = require('laravel-mix');
let webpack = require('webpack');

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
.ts('resources/js/app.ts', 'public/js/')
.vue()
.extract()
.sourceMaps()
.sass('resources/scss/app.scss', 'public/css/')
.sass('resources/scss/login.scss', 'public/css/')
.sass('resources/scss/error.scss', 'public/css')
.css('node_modules/normalize.css/normalize.css', 'public/css')
.browserSync('myapp.loc')
.disableNotifications();

mix.webpackConfig({
    plugins: [
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: true
        }),
    ],
});

if (mix.inProduction()) {
    mix.version();
}

const mix = require('laravel-mix');
// const VueLoaderPlugin = require()
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin.js');
const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');

import Swal from 'sweetalert2'

// CommonJS
const Swal = require('sweetalert2')
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
var webpackConfig ={
     plugins: [
        // new VueLoaderPlugin(),
         new VuetifyLoaderPlugin(),
         new CaseSensitivePathsPlugin(),
         new Swal(),


     ]
}
mix.webpackConfig(webpackConfig);

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')


// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js')
   .js('resources/js/admin.js', 'js')
   .sass('resources/sass/admin.scss', 'css');
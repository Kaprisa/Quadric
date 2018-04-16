let mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".json"]
    }
}).js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.sass', 'public/css')
  .js('resources/assets/js/landing/index.js', 'public/js/landing');

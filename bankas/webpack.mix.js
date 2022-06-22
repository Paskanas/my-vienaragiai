// webpack.mix.js

let mix = require('laravel-mix');

mix
  .js('src/js/app.js', 'public')
  .sass(
    'src/styles/app.scss',
    'public'
  );

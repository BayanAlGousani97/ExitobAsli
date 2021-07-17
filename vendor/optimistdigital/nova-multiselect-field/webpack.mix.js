let mix = require('laravel-mix');

mix
  .setPublicPath('dist')
  .js('resources/js/multiselect-field.js', 'js')
  .vue()
  .sass('resources/sass/multiselect-field.scss', 'css');

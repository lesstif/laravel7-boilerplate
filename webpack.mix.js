const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    });
//
// mix
//   .js('resources/js/app.js', 'public/js')
//   .postCss('resources/sass/app.sass', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('postcss-nested'),
//     require('autoprefixer'),
//   ]);

if (mix.inProduction()) {
  mix
    .version();
}

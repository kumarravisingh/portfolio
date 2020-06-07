const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    });

mix.js('resources/js/studio/app.js', 'public/js/studio.js')
    .sass('resources/sass/studio/app.scss','public/css/studio.css');
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

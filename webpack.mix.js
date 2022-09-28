const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

mix.postCss('resources/css/appbiznes.css', 'public/css');
mix.postCss('resources/css/appfakty.css', 'public/css');
mix.postCss('resources/css/apphistoria.css', 'public/css');
mix.postCss('resources/css/apphobby.css', 'public/css');
mix.postCss('resources/css/appkfd.css', 'public/css');
mix.postCss('resources/css/appkultura.css', 'public/css');
mix.postCss('resources/css/appmainpage.css', 'public/css');
mix.postCss('resources/css/appmotoryzacja.css', 'public/css');
mix.postCss('resources/css/appnauka.css', 'public/css');
mix.postCss('resources/css/appplportal.css', 'public/css');
mix.postCss('resources/css/appsalonpolityczny.css', 'public/css');
mix.postCss('resources/css/appsilyzbrojne.css', 'public/css');
mix.postCss('resources/css/appspoleczenstwo.css', 'public/css');
mix.postCss('resources/css/appsport.css', 'public/css');
mix.postCss('resources/css/appturystyka.css', 'public/css');

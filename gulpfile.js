var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            'libs/jquery.js',
            'libs/bootstrap.js',
            'libs/lightbox.min.js',
            'script.js'
        ], './public/js/app.js','resources/assets/js')
        .version([
            '/js/app.js',
            '/css/app.css'
        ]);

    mix.copy('resources/assets/sass/libs/font-awesome/fonts', 'public/build/fonts');
    mix.copy('resources/assets/sass/libs/lightbox/images', 'public/build/images');
});

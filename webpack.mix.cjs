const mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss', 'public/css') // If using SASS
    .styles([
        'resources/css/app.css',
        // Add more CSS files if needed
    ], 'public/css/all.css'); // Compile all CSS files into a single file

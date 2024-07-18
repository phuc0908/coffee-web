const mix = require("laravel-mix");

mix.copy("node_modules/bootstrap/dist/css/bootstrap.min.css", "public/css");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        processCssUrls: false,
    })
    .sass("node_modules/bootstrap/scss/bootstrap.scss", "public/css");

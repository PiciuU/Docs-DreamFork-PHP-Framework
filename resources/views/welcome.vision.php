<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Official Documentation for Dreamfork Framework – A powerful and flexible PHP framework. Explore features, usage examples, and get started with ease.">
        <meta name="keywords" content="Dreamfork, PHP framework, documentation, examples, getting started">
        <meta name="author" content="DreamSpeak">
        <meta name="robots" content="index, follow">

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <title>Dreamfork - The PHP Framework</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Source+Sans+Pro:wght@200;400;700&display=swap" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Source+Sans+Pro:wght@200;400;700&display=swap"  media="print" onload="this.media='all'" />

        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <style>
            @resource(css/welcome.css);
        </style>
    </head>
    <body>
        <div id="app">
            <main>
                <div class="main__content">
                    <h1> The PHP Framework </h1>
                    <h2> <span>Dreamfork</span> is a nimble and swift web application framework inspired by <a href="https://laravel.com" target="_blank">Laravel</a>, offering a lightweight and expressive syntax for seamless development.</h2>
                    <a class="main__btn" href="{{ app('url')->to('/docs/1.x/') }}">Get Started</a>
                </div>
            </main>
        </div>
    </body>
</html>

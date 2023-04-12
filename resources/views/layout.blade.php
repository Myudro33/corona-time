<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Corona Time</title>
        @vite('resources/css/app.css')
    </head>
    <body >
        <div>
            @yield('content')
        </div>
    </body>
</html>

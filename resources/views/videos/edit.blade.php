<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youtube</title>

    </head>
    <body>
        {{ $video->title }}
        {{ $video->iframe }}
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youtube</title>

    </head>
    <header>
        
    </header>
    <body>
        @forelse ($videos as $video)
            {{ $video->title }}
            {{ $video->iframe }}
        @empty
            <p>No hay videos subidos</p>
        @endforelse
    </body>
</html>

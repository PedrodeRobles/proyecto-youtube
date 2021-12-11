<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youtube</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <header>
        <div class="bg-gray-800 flex items-center justify-between  w-full h-12">
            <div class="flex items-center ml-2">
                <img class="w-6" src="/img/menu-burger.png" alt="">
                <a href="{{ url('dashboard') }}">
                    <img class="w-20 ml-4" src='/img/youtube.png' alt="youtube logo">
                </a>
            </div>
            <input class="rounded-md py-0" type="text" value="Search">
            <img class="rounded-full w-8 mr-2" src="/img/perfil.jpg" alt="Foto de perfil">
        </div>
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

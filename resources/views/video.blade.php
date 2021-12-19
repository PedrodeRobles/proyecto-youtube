<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youtube</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <header>
        <div class="bg-gray-800 flex fixed items-center justify-between  w-full h-12">
            <div class="flex items-center ml-8">
                <a href="{{ asset('/') }}">
                    <img class="w-20 ml-4" src='/img/youtube.png' alt="youtube logo">
                </a>
            </div>
            <input class="w-96 py-1 bg-gray-800 text-white" type="text" placeholder="Search">
            <a href="{{ route('videos.index') }}">
                <img class="rounded-full w-8 mr-6" src="/img/perfil.jpg" alt="Foto de perfil">
            </a>
        </div>
    </header>
    <body class="bg-gray-900">
        <div class="p-10 w-full h-96">
            <video src="{{ $video->get_video }}" controls></video>
        </div>
        
        <p class="text-white">
            {{ $video->title }}
        </p>
        {{ $video->user->name }}
        {{ $video->created_at }}
    </body>
</html>

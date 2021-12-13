<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Youtube</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <header>
        <div class="bg-gray-900 flex items-center justify-between  w-full h-12">
            <div class="flex items-center ml-2">
                <img class="w-6" src="/img/menu-burger.png" alt="">
                <a href="{{ url('dashboard') }}">
                    <img class="w-20 ml-4" src='/img/youtube.png' alt="youtube logo">
                </a>
            </div>
            <input class="w-96 py-1 bg-gray-800 text-white" type="text" placeholder="Search">
            <img class="rounded-full w-8 mr-6" src="/img/perfil.jpg" alt="Foto de perfil">
        </div>
    </header>
    <body class="bg-gray-900">
        @forelse ($videos as $video)

            {{-- Usuario --}}
            <div class="bg-gray-800">
                <div class="flex items-center ml-8 py-8 mb-8 w-full">
                    <img class="rounded-full w-13 mr-2" src="/img/perfil.jpg" alt="Foto de perfil">
                    <p class="text-white">{{ $video->user->name }}</p>
                </div>
            </div>
            
            {{-- Videos subidos --}}
            <div class="w-10/12 mx-auto">
                <div class="grid grid-cols-4 gap-6">
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                    <div class="bg-red-600">
                        {{ $video->title }}
                        {{ $video->iframe }}
                    </div>
                </div>
            </div>
        @empty
            <p>No hay videos subidos</p>
        @endforelse
    </body>
</html>

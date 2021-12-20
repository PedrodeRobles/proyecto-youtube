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
            <div class="flex items-center">
                <img src="/img/menu-burger.png" alt="Menu burger" class="w-6 ml-4" >
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
        {{-- Video --}}
        <div class="grid grid-cols-4 gap-4 mx-8 pt-16">
            <div class="col-span-3">
                <video src="{{ $video->get_video }}" controls class="w-full"></video>
                <div class="mt-3">
                    <h2 class="text-white text-lg">
                        {{ $video->title }}
                    </h2>
                    <div class="text-gray-400 text-sm pt-2 pb-4 border-b border-gray-700">
                        {{ $video->created_at->format('M d Y')}}
                    </div>
                    <div class="flex pt-4">
                        <div class="w-8">
                            <img class="rounded-full w-8 mr-2" src="/img/perfil.jpg" alt="Foto de perfil">
                        </div>
                        <p class="text-white text-sm ml-3 ">{{ $video->user->name }}</p>
                    </div>
                </div>
            </div>

            {{-- Lista de videos de la derecha --}}
            <div class="col-span-1 rounded-md hover:bg-gray-800 max-w-md">
                @foreach ($videos as $video)
                <a href="{{ route('video', $video) }}">
                    <div class="flex mb-2">
                        <img src="{{ $video->get_image }}" class="w-44 h-24 object-cover border-2 border-gray-800">
                        <div class="flex">
                            <div class="ml-2 w-40">
                                <div class="text-white text-sm">
                                    {{ $video->get_title }}
                                </div>
                                <div class="text-gray-400 hover:text-white text-xs">
                                    <a href="#">
                                        {{ $video->user->name }}
                                    </a>
                                </div>
                                <div class="text-gray-400 text-xs">
                                    {{ $video->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </body>
</html>

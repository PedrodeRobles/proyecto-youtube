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
        <div class="flex">
            {{-- Menu --}}
            <div class="fixed h-screen w-12 bg-gray-800">
                <img src="/img/menu-burger.png" alt="Menu burger" class="w-6 m-auto pt-3" >
                <a href="{{ asset('/') }}">
                    <img src="/img/home.png" alt="home" class="w-6 m-auto pt-12">
                </a>
                <p class="text-white text-xs text-center">Home</p>
            </div>
            
            {{-- Videos subidos --}}
            <div class="grid grid-cols-5 gap-2 pl-16 pr-4 pt-16">
                @forelse ($videos as $video)
                        <div class="rounded-md mx-auto mb-8 hover:bg-gray-800">
                            <img src="{{ $video->get_image }}" class="w-80 h-40 object-cover border-2 border-gray-800">
                            <div class="flex pt-2">
                                <div class="">
                                    <img class="rounded-full w-8" src="/img/perfil.jpg" alt="Foto de perfil">
                                </div>
                                <div class="pl-2">
                                    <div class="text-white text-md">
                                        {{ $video->title }}
                                    </div>
                                    <div class="text-gray-400 hover:text-white text-sm">
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
                @empty
                    <div class="flex justify-center">
                        <p class="text-white font-bold text-xl">En este momento ningún usuario subio videos</p>
                    </div>
                @endforelse
            </div>
        </div>
    </body>
</html>

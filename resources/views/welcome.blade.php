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
            <a href="{{ route('videos.index') }}">
                <img class="rounded-full w-8 mr-6" src="/img/perfil.jpg" alt="Foto de perfil">
            </a>
        </div>
    </header>
    <body class="bg-gray-900">
        

        {{-- Usuario y boton de subir video--}}
        <div class="flex justify-around items-center w-full bg-gray-800 mb-8">
            <div class="flex items-center py-8">
                <img class="rounded-full w-13 mr-2" src="/img/perfil.jpg" alt="Foto de perfil">
                {{-- <p class="text-white">{{ $video->user->name }}</p> --}}
            </div>
            <div>
                <button class="py-2 px-4 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg">
                    <a href="{{ route('videos.create') }}">Subir video</a>
                </button>
            </div>
        </div>
            
        {{-- Videos subidos --}}
        <div class="grid grid-cols-4">
            @forelse ($videos as $video)
                    <div class="rounded-md border-2 border-gray-800 mx-auto mb-10 hover:bg-gray-800">
                        <img src="{{ $video->get_image }}" class="w-80 h-44 object-cover">
                        <div class="text-white font-bold p-2">
                            {{ $video->title }}
                        </div>
                        <div class="flex justify-around py-4">
                            <a href="{{ route('videos.edit', $video) }}" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md">Editar</a>
                            <form action="{{ route('videos.destroy', $video) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Desea eliminar este video?')" class="py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-md">Eliminar</button>
                            </form>
                        </div>
                    </div>
            @empty
                <div class="flex justify-center">
                    <p class="text-white font-bold text-xl">No hay videos subidos</p>
                </div>
            @endforelse
        </div>
    </body>
</html>

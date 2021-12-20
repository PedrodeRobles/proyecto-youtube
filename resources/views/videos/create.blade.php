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
        <div class="w-1/2 m-auto mt-12 bg-gray-800 border-2 border-gray-400 rounded-lg">
            <div class="flex justify-center bg-gray-700 rounded-t-lg">
                <h2 class="text-white text-lg font-bold py-4">Subir video</h2>
            </div>
            <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-10/12 mx-10">                        
                    <div class="pt-6">
                        <p class="text-white">Título *</p>
                        <input type="text" name="title" required class="w-full">
                    </div>
                    <div class="pt-6">
                        <p class="text-white">Miniatura *</p>
                        <input type="file" name="image" required accept="image/*" class="w-full text-white">
                    </div>
                    <div class="pt-6">
                        <p class="text-white">Seleccionar video *</p>
                        <input type="file" name="video" required accept="video/*" class="w-full text-white">
                    </div>
                    <div class="pt-6">
                        <p class="text-white">Descripción</p>
                        <textarea name="description" rows="5" class="w-full"></textarea>
                    </div>
                    <div class="pb-10 pt-6">
                        <button class="mt-4 px-4 py-2 font-bold text-white bg-green-600 hover:bg-green-500 rounded-md">
                            Subir video
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>


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
        <div class="w-1/2 h-1/3 m-auto mt-12 bg-gray-200">
            <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                <div class="w-10/12 px-8 mx-10 bg-indigo-500">                        <div>
                        <p>Título *</p>
                        <input type="text" name="title" required class="w-full">
                    </div>
                    <div>
                        <p>Contenido embebido *</p>
                        <textarea name="iframe" rows="4" class="w-full"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>


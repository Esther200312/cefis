<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEFIS</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-lvh flex flex-col items-stretch">
    <header class="p2 bg-amber-100 shadow-md shadow-gray-300">
        <h1 class="text-2xl font-bold w-full text-center uppercase px-10">
            Administracion de certificados
        </h1>
        <p class="m-1 fond-bold text-md text-center">
            FIS-UNCP
        </p>
        @auth
        <div class="w-full text-center">
            <a class="p-3 text-red-500 text-x1 rounded-lg fond-bold md:absolute md:top-0 md:right-0" href="{{route('logout')}}">Salir</a>
        </div>
        @endauth
    </header>
    <div class="w-full py-3 grow">
        @yieLd('contenido')
    </div>
</body>
</html>
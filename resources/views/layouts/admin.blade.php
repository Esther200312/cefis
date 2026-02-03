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
    <header class="p-6 bg-[#0E385D] shadow-xl border-b-4 border-[#ca8a04] flex flex-col items-center justify-center">
        <h1 class="w-full text-center uppercase px-4
               text-3xl md:text-5xl font-black
               bg-gradient-to-b from-[#F9F295] via-[#E0AA3E] to-[#B88A44]
               bg-clip-text text-transparent
               drop-shadow-[0_3px_2px_rgba(0,0,0,0.6)]
               tracking-tight">
            Administracion de certificados
        </h1>

        <p class="mt-2 text-xl md:text-2xl font-bold text-center uppercase tracking-[0.2em]
              bg-gradient-to-b from-[#F9F295] via-[#E0AA3E] to-[#B88A44]
              bg-clip-text text-transparent
              drop-shadow-[0_2px_1px_rgba(0,0,0,0.6)]">
            FIS-UNCP
        </p>
        @auth
        <div class="w-full text-center">
            <a class="px-2 py-1 text-xs font-bold text-white uppercase tracking-wider bg-gradient-to-r from-blue-700 to-blue-500 hover:from-blue-800 hover:to-blue-600 rounded-full shadow-md md:absolute md:top-4 md:right-2 transition-transform hover:scale-105"
                href="{{route('logout')}}">Salir</a>
        </div>
        @endauth
    </header>
    <div class="w-full py-3 grow">
        @yieLd('contenido')
    </div>
</body>

</html>
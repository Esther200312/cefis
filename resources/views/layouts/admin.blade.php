<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEFIS - Administración</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="w-full min-h-screen flex flex-col items-stretch bg-slate-50">
<header class="relative w-full py-6 border-b-[6px] border-[#bf9b30] shadow-2xl flex flex-col items-center justify-center overflow-hidden bg-gradient-to-br from-[#003366] to-[#004e92]">
   @auth
        @if(request()->is('evento*'))
            @php
                $rutaDestino = route('dashboard');
                if(request()->is('*/certificados') || request()->segment(3)) {
                    $id = request()->segment(2);
                    $rutaDestino = url('evento/' . $id);
                }
            @endphp
            <div class="absolute top-6 left-6 z-50 hidden md:block">
                <a href="{{ $rutaDestino }}" 
                   class="group flex items-center gap-3 px-5 py-2 border-2 border-[#bf9b30] text-[#bf9b30] font-bold text-sm uppercase tracking-widest rounded transition-all duration-300 hover:bg-[#bf9b30] hover:text-[#001529] hover:shadow-[0_0_15px_rgba(191,155,48,0.6)]">
                    <span>ATRÁS</span>
                </a>
            </div>
        @endif
    @endauth
    <div class="flex flex-col md:flex-row items-center justify-center gap-6 px-4 z-10">
        
        <img src="{{ asset('img/logo.png') }}" 
             alt="Logo UNCP" 
             class="h-20 w-auto drop-shadow-md"
             onerror="this.style.display='none'">
      
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tight leading-none drop-shadow-lg">
                Administración <br class="hidden md:block" /> 
                <span class="text-2xl md:text-4xl font-bold">de Certificados</span>
            </h1>
            
            <p class="mt-2 text-0xl md:text-2xl font-bold text-[#bf9b30] uppercase tracking-[0.3em] drop-shadow-sm">
                FIS - UNCP
            </p>
        </div>
       
    </div>
    @auth
    <div class="absolute top-6 right-6 z-50">
        <a href="{{ route('logout') }}" 
           class="group flex items-center gap-3 px-5 py-2 border-2 border-[#bf9b30] text-[#bf9b30] font-bold text-sm uppercase tracking-widest rounded transition-all duration-300 hover:bg-[#bf9b30] hover:text-[#001529] hover:shadow-[0_0_15px_rgba(191,155,48,0.6)]">
            
            <span>SALIR</span>
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" 
                 class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
        </a>
    </div>
    @endauth
</header>
    <div class="w-full grow relative">
        @yield('contenido')
    </div>

</body>
</html>
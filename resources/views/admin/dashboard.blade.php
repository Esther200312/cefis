@extends('layouts.admin')
@section('contenido')
<div class="text-center py-8 mb-4">
        <h1 class="text-2xl md:text-3xl font-black text-[#003366] uppercase tracking-widest drop-shadow-sm">
            Bienvenido <span class="text-[#bf9b30]">Administrador</span>
         </h1>
      </div>
   <div class="flex justify-end px-4 mb-8">
    <a href="{{route('add-evento')}}" 
       class="px-8 py-3 bg-[#bf9b30] text-[#001529] font-black uppercase tracking-widest text-sm rounded-full shadow-lg hover:bg-[#a38426] hover:scale-105 transition-all duration-300 flex items-center gap-2">
        <span>Agregar Evento</span>
    </a>
</div>
   <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 px-4 pb-12 max-w-7xl mx-auto">
    @foreach ($eventos as $evento)
    <a href="{{route('evento', ['evento_id'=>$evento->id])}}" 
       class="group relative bg-white p-6 rounded-xl shadow-md border-l-[6px] border-gray-200 hover:border-[#bf9b30] hover:-translate-y-1 hover:shadow-xl transition-all duration-300 overflow-hidden">
        
        <div class="absolute -right-6 -bottom-6 text-gray-100 group-hover:text-gray-50 transition-colors pointer-events-none">
            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
            </svg>
        </div>

        <div class="flex items-center justify-between relative z-10">
            <div class="pr-4">
                <h3 class="text-lg font-black text-[#003366] group-hover:text-[#bf9b30] transition-colors uppercase tracking-tight leading-snug">
                    {{$evento->name}}
                </h3>
                
                <span class="inline-block mt-2 text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-1 rounded-md tracking-widest uppercase">
                    Ver Certificados
                </span>
            </div>

            <div class="shrink-0 w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-[#bf9b30] group-hover:text-white group-hover:border-[#bf9b30] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection
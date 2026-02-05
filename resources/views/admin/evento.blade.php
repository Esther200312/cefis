@extends('layouts.admin')
@section('contenido')

<div class="p-6 max-w-7xl mx-auto space-y-8 animate-fade-in-down">
    
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-[#003366] flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="w-full md:w-auto text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-black text-[#003366] uppercase tracking-tight">
                {{ $evento->name }}
            </h1>
        </div>
        
        <div class="flex flex-wrap justify-center gap-3">
            @if ($evento->certificado_base != null)
            <a href="{{ route('admin-certificados', ['evento_id' => $evento_id]) }}" 
               class="px-5 py-2.5 bg-[#003366] text-white font-bold text-sm rounded shadow hover:bg-[#002244] transition-transform hover:-translate-y-0.5 flex items-center gap-2">
                VER CERTIFICADOS
            </a>
            @endif
            
            <a href="{{ route('add-certificado-base', ['evento_id' => $evento_id]) }}" 
               class="px-5 py-2.5 bg-[#bf9b30] text-[#001529] font-bold text-sm rounded shadow hover:bg-[#a38426] transition-transform hover:-translate-y-0.5 flex items-center gap-2">
                CERTIFICADO BASE
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#003366]">
            <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#003366] uppercase tracking-wide flex items-center gap-2">
                    Organizadores
                </h3>
                <div class="flex gap-2">
                    <a href="{{ route('add-organizador', ['evento_id' => $evento_id]) }}" class="text-[10px] font-bold bg-[#003366] text-white px-3 py-1.5 rounded hover:bg-[#002244] uppercase">
                        + Agregar
                    </a>
                    <a href="{{ route('exportar-organizadores', ['evento_id' => $evento_id]) }}" class="text-[10px] font-bold bg-green-600 text-white px-3 py-1.5 rounded hover:bg-green-700 uppercase">
                        Exportar
                    </a>
                </div>
            </div>
            
            <ul class="divide-y divide-gray-100">
                @foreach ($organizadores as $organizador)
                <li class="p-4 hover:bg-blue-50 transition-colors flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-[#003366]"></div>
                    <p class="text-sm font-semibold text-gray-700 uppercase">
                        {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name }}
                    </p>
                </li>
                @endforeach
                @if(count($organizadores) == 0)
                    <li class="p-6 text-center text-gray-400 text-sm italic">No hay organizadores registrados.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#bf9b30]">
            <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#bf9b30] uppercase tracking-wide">
                    Ponentes
                </h3>
                <a href="{{ route('add-ponente', ['evento_id' => $evento_id]) }}" class="text-[10px] font-bold bg-[#bf9b30] text-[#001529] px-3 py-1.5 rounded hover:bg-[#a38426] uppercase">
                    + Agregar Ponente
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100">
                @foreach ($ponentes as $ponente)
                <li class="p-4 hover:bg-amber-50 transition-colors">
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 rounded-full bg-[#bf9b30] mt-1.5"></div>
                        <div>
                            <p class="text-sm font-black text-gray-800 uppercase">
                                {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name }}
                            </p>
                            <p class="text-xs text-gray-500 uppercase mt-0.5 font-medium bg-gray-100 inline-block px-2 py-0.5 rounded">
                                Tema: {{ $ponente->pivot->ponencia }}
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
                @if(count($ponentes) == 0)
                    <li class="p-6 text-center text-gray-400 text-sm italic">No hay ponentes registrados.</li>
                @endif
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-3 border-b border-gray-100 bg-gray-50">
                <h3 class="font-bold text-gray-600 uppercase text-sm">Asistentes Confirmados</h3>
            </div>
            <ul class="p-4 max-h-60 overflow-y-auto space-y-2 custom-scrollbar">
                @foreach ($asistentes as $asistente)
                <li class="flex items-center gap-2 text-gray-600 text-sm border-b border-gray-50 pb-2 last:border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    {{ $asistente->paternal_surname }} {{ $asistente->maternal_surname }} {{ $asistente->name }}
                </li>
                @endforeach
                @if(count($asistentes) == 0)
                    <li class="text-gray-400 text-xs italic">Aún no hay asistentes.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-3 border-b border-gray-100 bg-gray-50">
                <h3 class="font-bold text-gray-600 uppercase text-sm">Pre-inscritos</h3>
            </div>
            <ul class="p-4 max-h-60 overflow-y-auto space-y-2 custom-scrollbar">
                @if (isset($preregistrados) && count($preregistrados) > 0)
                    @foreach ($preregistrados as $preregistrado)
                    <li class="flex items-center gap-2 text-gray-500 text-sm border-b border-gray-50 pb-2 last:border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                        {{ $preregistrado->paternal_surname }} {{ $preregistrado->maternal_surname ?? '' }} {{ $preregistrado->name ?? '' }}
                    </li>
                    @endforeach
                @else
                    <li class="text-gray-400 text-xs italic py-2">No hay personas pre-registradas en este evento.</li>
                @endif
            </ul>
        </div>
    </div>

</div>

@endsection

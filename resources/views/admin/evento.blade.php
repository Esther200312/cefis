@extends('layouts.admin')
@section('contenido')

<div class="p-6 max-w-7xl mx-auto space-y-8 animate-fade-in-down">
    
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-[#003366] flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-black text-[#003366] uppercase tracking-tight">
                {{ $evento->name }}
            </h1>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin-certificados', ['evento_id' => $evento_id]) }}" class="px-5 py-2.5 bg-[#003366] text-white font-bold text-xs uppercase rounded shadow hover:bg-[#002244] transition-all">
                VER CERTIFICADOS
            </a>
            <a href="{{ route('add-certificado-base', ['evento_id' => $evento_id]) }}" class="px-5 py-2.5 bg-[#bf9b30] text-[#001529] font-bold text-xs uppercase rounded shadow hover:bg-[#a38426] transition-all">
                CERTIFICADO BASE
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#003366]">
            <div class="bg-white px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#003366] uppercase">ORGANIZADORES</h3>
                <div class="flex gap-2">
                    <a href="{{ route('add-organizador', ['evento_id' => $evento_id]) }}" class="bg-[#003366] text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#002244] transition-colors">
                        + AGREGAR
                    </a>
                    <a href="{{ route('exportar-organizadores', ['evento_id' => $evento_id]) }}" class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-green-700 transition-colors">
                        EXPORTAR
                    </a>
                </div>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4">
                @foreach ($organizadores as $organizador)
                <li class="py-3 flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-[#003366]"></div>
                    <span class="text-xs font-bold text-gray-700 uppercase">
                        {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name }}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#bf9b30]">
            <div class="bg-[#fffdf5] px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#bf9b30] uppercase">PONENTES</h3>
                <a href="{{ route('add-ponente', ['evento_id' => $evento_id]) }}" class="bg-[#bf9b30] text-[#001529] px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#a38426] transition-colors">
                    + AGREGAR PONENTE
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4">
                @foreach ($ponentes as $ponente)
                <li class="py-3">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="w-2 h-2 rounded-full bg-[#bf9b30]"></div>
                        <span class="text-xs font-black text-gray-800 uppercase">
                            {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name }}
                        </span>
                    </div>
                    <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded ml-5 uppercase">
                        Tema: {{ $ponente->pivot->ponencia }}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#003366]">
            <div class="bg-white px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#003366] uppercase">ASISTENTES CONFIRMADOS</h3>
                <a href="{{ route('get-add-asistente', ['evento_id' => $evento_id]) }}" class="bg-[#003366] text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#002244] transition-colors">
                    + AGREGAR
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-60 overflow-y-auto">
                @foreach ($asistentes as $asistente)
                <li class="py-3 flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-[#003366]"></div>
                    <span class="text-xs font-bold text-gray-700 uppercase">
                        {{ $asistente->paternal_surname }} {{ $asistente->maternal_surname }} {{ $asistente->name }}
                    </span>
                </li>
                @endforeach
                @if(count($asistentes) == 0)
                    <li class="text-center text-gray-400 text-xs italic py-4">Aún no hay asistentes.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#bf9b30]">
            <div class="bg-[#fffdf5] px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-[#bf9b30] uppercase">PRE-INSCRITOS</h3>
                <a href="{{ route('get-add-preregistrado', ['evento_id' => $evento_id]) }}" class="bg-[#bf9b30] text-[#001529] px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#a38426] transition-colors">
                    + AGREGAR
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-60 overflow-y-auto">
                @foreach ($preregistrados as $preregistrado)
                <li class="py-3 flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-[#bf9b30]"></div>
                    <span class="text-xs font-bold text-gray-700 uppercase">
                        {{ $preregistrado->paternal_surname }} {{ $preregistrado->maternal_surname }} {{ $preregistrado->name }}
                    </span>
                </li>
                @endforeach
                @if(count($preregistrados) == 0)
                    <li class="text-center text-gray-400 text-xs italic py-4">No hay personas pre-registradas.</li>
                @endif
            </ul>
        </div>

    </div>

</div>

@endsection
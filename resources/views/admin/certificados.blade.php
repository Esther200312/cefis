@extends('layouts.admin')
@section('contenido')

<div class="p-6 max-w-7xl mx-auto space-y-8 animate-fade-in-down">
    
    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-[#bf9b30] flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl md:text-2xl font-black text-[#003366] uppercase tracking-tight">
                Certificados del Evento
            </h1>
            <p class="text-[#bf9b30] font-bold text-lg uppercase mt-1">
                {{ $evento->name }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#003366]">
            <div class="bg-gray-50 px-6 py-5 border-b flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-bold text-[#003366] uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-[#003366] rounded-full"></span>
                    Organizadores
                </h3>
                <a href="{{ route('generar_organizadores', ['evento_id' => $evento_id]) }}" class="w-full sm:w-auto text-center px-4 py-2 bg-[#003366] text-white font-bold text-xs uppercase rounded shadow hover:bg-[#002244] hover:-translate-y-0.5 transition-all">
                    Generar Todos
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white max-h-96 overflow-y-auto">
                @foreach ($organizadores as $organizador)
                <li class="p-4 hover:bg-blue-50 transition-colors flex items-center justify-between group gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-gray-300 group-hover:bg-[#003366] transition-colors"></div>
                        <span class="font-bold text-gray-700 uppercase text-xs md:text-sm">
                            {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name }}
                        </span>
                    </div>

                    <div class="shrink-0">
                        @php $encontrado = false; @endphp
                        @if ($organizador->pivot->certificado_creado)
                            @foreach ($certificados as $certificado)
                                @if ($certificado->tipo_id == 4 && $certificado->user_id == $organizador->id)
                                    <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}" target="_blank"
                                       class="inline-block text-green-700 bg-green-50 border border-green-200 font-bold text-[10px] uppercase px-4 py-2 rounded hover:bg-green-100 hover:text-green-900 transition-all">
                                        Ver Certificado
                                    </a>
                                    @php $encontrado = true; @endphp
                                @endif
                            @endforeach
                        @endif
                        @if (!$encontrado)
                            <span class="inline-flex items-center gap-1.5 text-amber-600 bg-amber-50 border border-amber-200 font-bold text-[10px] uppercase px-3 py-1.5 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Falta Generar
                            </span>
                        @endif
                    </div>
                </li>
                @endforeach
                @if(count($organizadores) == 0)
                    <li class="p-6 text-center text-gray-400 text-sm italic">No hay organizadores registrados.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#bf9b30]">
            <div class="bg-gray-50 px-6 py-5 border-b flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-bold text-[#bf9b30] uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-[#bf9b30] rounded-full"></span>
                    Ponentes
                </h3>
                <a href="{{ route('generar_ponentes', ['evento_id' => $evento_id]) }}" class="w-full sm:w-auto text-center px-4 py-2 bg-[#bf9b30] text-[#001529] font-bold text-xs uppercase rounded shadow hover:bg-[#a38426] hover:-translate-y-0.5 transition-all">
                    Generar Todos
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white max-h-96 overflow-y-auto">
                @foreach ($ponentes as $ponente)
                <li class="p-4 hover:bg-amber-50 transition-colors flex flex-col sm:flex-row sm:items-center justify-between group gap-2">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                             <div class="w-2 h-2 rounded-full bg-gray-300 group-hover:bg-[#bf9b30] transition-colors"></div>
                             <span class="font-black text-gray-800 uppercase text-xs md:text-sm">
                                {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name }}
                             </span>
                        </div>
                        <span class="text-[10px] text-gray-400 uppercase ml-4 mt-1 font-medium">
                            {{ $ponente->pivot->ponencia ?? 'Tema no registrado' }}
                        </span>
                    </div>

                    <div class="shrink-0 self-end sm:self-center mt-2 sm:mt-0">
                        @php $encontrado = false; @endphp
                        @if ($ponente->pivot->certificado_creado)
                            @foreach ($certificados as $certificado)
                                @if ($certificado->tipo_id == 3 && $certificado->user_id == $ponente->id)
                                    <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}" target="_blank"
                                       class="inline-block text-green-700 bg-green-50 border border-green-200 font-bold text-[10px] uppercase px-4 py-2 rounded hover:bg-green-100 hover:text-green-900 transition-all">
                                        Ver Certificado
                                    </a>
                                    @php $encontrado = true; @endphp
                                @endif
                            @endforeach
                        @endif
                        @if (!$encontrado)
                            <span class="inline-flex items-center gap-1.5 text-amber-600 bg-amber-50 border border-amber-200 font-bold text-[10px] uppercase px-3 py-1.5 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Falta Generar
                            </span>
                        @endif
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

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#003366]">
            <div class="bg-gray-50 px-6 py-5 border-b flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-bold text-[#003366] uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-[#003366] rounded-full"></span>
                    Asistentes
                </h3>
                <a href="{{ route('generar_asistentes', ['evento_id' => $evento_id]) }}" class="w-full sm:w-auto text-center px-4 py-2 bg-[#003366] text-white font-bold text-xs uppercase rounded shadow hover:bg-[#002244] hover:-translate-y-0.5 transition-all">
                    Generar Todos
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white max-h-96 overflow-y-auto">
                @foreach ($asistentes as $asistente)
                <li class="p-4 hover:bg-blue-50 transition-colors flex items-center justify-between group gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-gray-300 group-hover:bg-[#003366] transition-colors"></div>
                        <span class="font-bold text-gray-700 uppercase text-xs md:text-sm">
                            {{ $asistente->paternal_surname }} {{ $asistente->maternal_surname }} {{ $asistente->name }}
                        </span>
                    </div>

                    <div class="shrink-0">
                        @php $encontrado = false; @endphp
                        {{-- ID = 2 para Asistentes --}}
                        @foreach ($certificados as $certificado)
                            @if ($certificado->tipo_id == 2 && $certificado->user_id == $asistente->id)
                                <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}" target="_blank"
                                   class="inline-block text-green-700 bg-green-50 border border-green-200 font-bold text-[10px] uppercase px-4 py-2 rounded hover:bg-green-100 hover:text-green-900 transition-all">
                                    Ver Certificado
                                </a>
                                @php $encontrado = true; @endphp
                            @endif
                        @endforeach

                        @if (!$encontrado)
                            <span class="inline-flex items-center gap-1.5 text-amber-600 bg-amber-50 border border-amber-200 font-bold text-[10px] uppercase px-3 py-1.5 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Falta Generar
                            </span>
                        @endif
                    </div>
                </li>
                @endforeach
                @if(count($asistentes) == 0)
                    <li class="p-6 text-center text-gray-400 text-sm italic">No hay asistentes registrados.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full border-t-4 border-[#bf9b30]">
            <div class="bg-gray-50 px-6 py-5 border-b flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-bold text-[#bf9b30] uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-[#bf9b30] rounded-full"></span>
                    Pre-Inscritos
                </h3>
                <a href="{{ route('generar_preregistrados', ['evento_id' => $evento_id]) }}" class="w-full sm:w-auto text-center px-4 py-2 bg-[#bf9b30] text-[#001529] font-bold text-xs uppercase rounded shadow hover:bg-[#a38426] hover:-translate-y-0.5 transition-all">
                    Generar Todos
                </a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white max-h-96 overflow-y-auto">
                @foreach ($preregistrados as $pre)
                <li class="p-4 hover:bg-amber-50 transition-colors flex items-center justify-between group gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-gray-300 group-hover:bg-[#bf9b30] transition-colors"></div>
                        <span class="font-bold text-gray-700 uppercase text-xs md:text-sm">
                            {{ $pre->paternal_surname }} {{ $pre->maternal_surname }} {{ $pre->name }}
                        </span>
                    </div>

                    <div class="shrink-0">
                        @php $encontrado = false; @endphp
                        @foreach ($certificados as $certificado)
                            @if ($certificado->tipo_id == 1 && $certificado->user_id == $pre->id)
                                <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}" target="_blank"
                                   class="inline-block text-green-700 bg-green-50 border border-green-200 font-bold text-[10px] uppercase px-4 py-2 rounded hover:bg-green-100 hover:text-green-900 transition-all">
                                    Ver Certificado
                                </a>
                                @php $encontrado = true; @endphp
                            @endif
                        @endforeach
                        @if (!$encontrado)
                            <span class="inline-flex items-center gap-1.5 text-amber-600 bg-amber-50 border border-amber-200 font-bold text-[10px] uppercase px-3 py-1.5 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Falta Generar
                            </span>
                        @endif
                    </div>
                </li>
                @endforeach
                @if(count($preregistrados) == 0)
                    <li class="p-6 text-center text-gray-400 text-sm italic">No hay pre-inscritos.</li>
                @endif
            </ul>
        </div>

    </div>
</div>

@endsection
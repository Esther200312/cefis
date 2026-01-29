@extends('layouts.admin')
@section('contenido')
    <div class="flex flex-col items-stretch">
        <h2 class="text-3xl font-bold uppercase text-center pb-4">
            Certificados del evento {{ $evento->name }}
        </h2>

        <h3 class="text-lg uppercase font-bold p-3 bg-gray-200">
            Organizadores
        </h3>
        <div class="text-justify">
            <a class="inline-block p-3 bg-blue-500 text-white"
                href="{{ route('generar_organizadores', ['evento_id' => $evento_id]) }}">
                Generar Certificados
            </a>
        </div>
        <ul class="flex flex-col items-stretch">
            @foreach ($organizadores as $organizador)
                <li class="p-3 flex flex-nowrap">
                    <p class="text-xl uppercase text-gray-900 grow">
                        {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name }}
                    </p>
                    @if ($organizador->pivot->certificado_creado)
                        @foreach ($certificados as $certificado)
                            @if ($certificado->tipo_id == 4 && $certificado->user_id == $organizador->id)
                                <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}"
                                    class="text-xl text-green-600 font-semibold p-2" target="_blank">
                                    Ver certificado
                                </a>
                            @endif
                        @endforeach
                    @else
                        <span class="text-xl text-amber-600 font-semibold p-2">No creado</span>
                    @endif
                </li>
            @endforeach
        </ul>
        <hr>
        <div class="text-center">
            <h3 class="text-lg uppercase font-bold p-3 bg-gray-200">
                Ponentes
            </h3>
        </div>
        <div class="text-center">
            <a class=" inline-block p-3 bg-blue-500 text-white"
                href="{{ route('generar_ponentes', ['evento_id' => $evento_id]) }}">
                Generar Certificados
            </a>
        </div>
        <ul class="flex flex-col items-stretch">
            @foreach ($ponentes as $ponente)
                <li class="p-4 flex flex-nowrap">
                    <div class="flex flex-col items-stretch grow">
                        <p class="py-1 text-xl uppercase text-gray-900">
                            {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name }}
                        </p>
                        <p class="px-7 text-md uppercase text-gray-700 italic">
                            {{ $ponente->pivot->ponencia }}
                        </p>
                    </div>
                    <div class="flex items-center justify-center">
                        @if ($ponente->pivot->certificado_creado)
                            @foreach ($certificados as $certificado)
                                @if ($certificado->tipo_id == 3 && $certificado->user_id == $ponente->id)
                                    <a href="{{ route('documento', ['certificado_id' => $certificado->id]) }}"
                                        class="text-xl text-green-600 font-semibold p-2" target="_blank">
                                        Ver certificado
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <span class="text-xl text-amber-600 font-semibold p-2">No creado</span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

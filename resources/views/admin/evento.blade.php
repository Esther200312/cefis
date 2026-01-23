@extends('layouts.admin')
@section('contenido')
<h2>
    {{$evento->name}}
</h2>
<hr>
<h3>
   Organizadores
    </h3>
    <ul>
        @foreach ($organizadores as $organizador)
            <li>
                <p>
                    {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name}}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    <h3>
        Ponentes
    </h3>
     @foreach ($ponentes as $ponente)
            <li>
                <p>
                    {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name}}
                </p>
            </li>
        @endforeach
    <hr>
    <h3>
        Asistentes
    </h3>
     @foreach ($asistentes as $asistente)
            <li>
                <p>
                    {{ $asistente->paternal_surname }} {{ $asistente->maternal_surname }} {{ $asistente->name}}
                </p>
            </li>
        @endforeach
    <hr>
    <h3>
        Pre inscritos
   </h3>
    @foreach ($preregistrados as $preregistrado)
            <li>
                <p>
                    {{ $preregistrado->paternal_surname }} {{ $preregistrado->maternal_surname }} {{ $preregistrado->name}}
                </p>
            </li>
        @endforeach

@endsection
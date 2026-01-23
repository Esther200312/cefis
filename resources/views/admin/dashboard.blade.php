@extends('layouts.admin')
@section('contenido')
 <h1>
    Bienvenido administrador
 </h1>
 <hr>
 <ul>
    @foreach ($eventos as $evento)
     <li>
        <a href="{{route('evento',['evento_id'=>$evento->id]) }}">
         {{$evento->name}} 
        </a>
     </li>
    @endforeach
 </ul>
@endsection
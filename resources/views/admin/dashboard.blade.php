@extends('layouts.admin')
@section('contenido')
<div class="flex flex-col items-stretch">
   <h1 class="text-3xl uppercase text-gray-900 font-bold text-shadow-xs text-center">
      Bienvenido administrador
   </h1>
   <div class="text-right m-3">  
   <a href="{{route('add-evento')}}" class="p-3 bg-blue-500 text-white text-lg rounded-md">
      Agregar Evento
   </a>
   </div>
   <ul class="flex flex-col items-stretch px-4">
      @foreach ($eventos as $evento)
       <li class="my-2 border-b border-gray-500">
          <a href="{{route('evento', ['evento_id'=>$evento->id])}}" class="block w-full text-2x1 font-bold text-blue-400">
           {{$evento->name}} 
          </a>
       </li>
      @endforeach
   </ul>
</div>
@endsection
@extends('layouts.admin')
@section('contenido')
<a href="{{route('dashboard')}}">
    Atras
</a>
<form method="post">
     @csrf
     <legend>
         Crear evento
     </legend>
    <div>
        <label for="name">
            Nombre:
        </label>
        <input required type="text" value="{{ old('name') }}" id="name" name="name" placeholder="Nombre del evento">
        @error('name')
        <p>
            {{$message}}
        </p>
        @enderror
    </div> 
    <div>
        <label for="fecha">
            Fecha:
        </label>
        <input required type="date" id="fecha" value="{{ old('fecha') }}" name="fecha" placeholder="Fecha del evento">
         @error('fecha')
        <p>
            {{$message}}
        </p>
        @enderror
    </div>   
    <div>
        <label for="address">
            Direccion:
        </label>
        <input type="text" id="address" value="{{ old('address') }}" name="address" placeholder="Direccion del evento">
         @error('address')
        <p>
            {{$message}}
        </p>
        @enderror
    </div>  
     <div>
        <label for="URL">
           URL:
        </label>
        <input type="url" id="url" value="{{ old('url') }}" name="url" placeholder="URL del evento">
         @error('url')
        <p>
            {{$message}}
        </p>
        @enderror
    </div> 
        <button type="submit">
            Crear:
        </button>
</form>
@endsection
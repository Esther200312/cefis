@extends('layouts.admin')
@section('contenido')
<div class="flex items-center justify-center">
    <form method="post" class="w-lg shadow-xl shadow-gray-300 px-4 border border-gray-400"> 
    @csrf
    <legend class="text-2xl font-bold text-gray-700 text-center p-4">
        Agregar Organizador
    </legend>
    <div class="flex flex-col">
        <label for="organizador" class="text-lg text-gray-800 font-semibold py-3">
            Organizador
        </label>
        <select name="organizador" id="organizador" class="p-2 text-lg text-gray-900 border border-amber-500">
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->paternal_surname }} {{ $user->maternal_surname }} {{ $user->name}}
                </option>
            @endforeach
        </select>
        @error('organizador')
        <p class="text-red-500 text-lg">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="text-center">
    <button type="submit" class="my-4 p-3 bg-blue-500  text-white text-lg rounded-md">
        Agregar
    </button>
    </div>
</form>
</div>
@endsection
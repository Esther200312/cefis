@extends('layouts.admin')
@section('contenido')
<div class="w-full h-full flex items-center justify-center bg-gray-200">
    <form method="post" class="p-5 border border-gray-300 shadow-md shadow-gray-400 rounded-xl bg-white w-8/12 max-w-lg">
        @csrf
        @isset($error)
            <p>
                {{ $error }}
            </p>
        @endisset
        <div class="p-3 w-full flex flex-col items-stretch">
            <label for="email" class="text-lg text-gray-700 font-bold">
                Email:
            </label>
            <input class="m-2 p-2 text-lg border border-gray-500" id="email" value="{{old('email')}}" name="email" type="email">
            @error('email')
            <p class="font-bold text-lg text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="p-3 w-full flex flex-col items-stretch">
            <label for="password" class="text-lg text-gray-700 font-bold">
                Password:
            </label>
            <input class="m-2 p-2 text-lg border border-gray-500" id="password" value="{{old('password')}}" name="password" type="password">
             @error('password')
            <p class="font-bold text-lg text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="text-center">
            <input class="p-4 text-xl uppercase text-white bg-blue-500 rounded-lg cursor-pointer hover:bg-amber-500" type="submit" value="Ingresar">
        </div>
    </form>
</div>
@endsection
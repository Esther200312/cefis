@extends('layouts.admin')
@section('contenido')
    <form method="post">
        @csrf
        @isset($error)
            <p>
                {{ $error }}
            </p>
        @endisset
        <div>
            <label for="email">
                Email:
            </label>
            <input id="email" value="{{old('email')}}" name="email" type="email">
            @error('email')
            <p>
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="password">
                Password:
            </label>
            <input id="password" value="{{old('password')}}" name="password" type="password">
             @error('password')
            <p>
                {{ $message }}
            </p>
            @enderror
        </div>
        <input type="submit" value="Ingresar">
    </form>
@endsection
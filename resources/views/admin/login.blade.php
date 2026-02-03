@extends('layouts.admin')
@section('contenido')
<div class="w-full h-full flex items-center justify-center bg-gray-50">
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm bg-white p-8 rounded-2xl shadow-2xl space-y-6">
        @csrf
        <div>
            <label class="block text-gray-700 font-bold mb-1 ml-1">Email:</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-400 transition-all shadow-sm">
                <div class="bg-gray-100 p-3 border-r border-gray-300 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input type="email" name="email" placeholder="ejemplo@uncp.edu.pe"
                    class="w-full py-3 px-4 text-gray-700 outline-none placeholder-gray-400 bg-white"
                    value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
            <p class="text-red-500 text-xs italic mt-1 ml-1 font-bold">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-bold mb-1 ml-1">Password:</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-400 transition-all shadow-sm">
                <div class="bg-gray-100 p-3 border-r border-gray-300 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input type="password" name="password" placeholder="********"
                    class="w-full py-3 px-4 text-gray-700 outline-none placeholder-gray-400 bg-white"
                    required>
            </div>
            @error('password')
            <p class="text-red-500 text-xs italic mt-1 ml-1 font-bold">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-bold rounded-full shadow-lg transform transition hover:-translate-y-0.5 tracking-wide">
                INGRESAR
            </button>
        </div>
    </form>
</div>
@endsection
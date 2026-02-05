@extends('layouts.admin')
@section('contenido')
<div class="max-w-4xl mx-auto p-6 animate-fade-in-down">
    <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#003366] p-8">
        <h2 class="text-2xl font-black text-[#003366] mb-6 pb-4 border-b flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            AGREGAR ORGANIZADOR
        </h2>
        <form action="{{ route('add-organizador', ['evento_id' => $evento_id]) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Seleccionar Usuario</label>
                <select name="organizador" class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700 transition-colors">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->paternal_surname }} {{ $user->maternal_surname }} {{ $user->name}}
                        </option>
                    @endforeach
                </select>
                @error('organizador')
                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-4 pt-6 border-t mt-8">
                <a href="{{ route('evento', ['evento_id' => $evento_id]) }}" class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-100 transition-colors uppercase text-sm flex items-center">
                    Cancelar
                </a>
                <button type="submit" class="px-8 py-2 rounded-lg font-bold text-white bg-[#003366] hover:bg-[#002244] shadow-md transition-all uppercase text-sm hover:-translate-y-0.5">
                    Guardar Organizador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
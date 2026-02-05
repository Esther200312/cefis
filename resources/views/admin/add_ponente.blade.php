@extends('layouts.admin')
@section('contenido')
<div class="max-w-4xl mx-auto p-6 animate-fade-in-down">
    <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#bf9b30] p-8">
        <h2 class="text-2xl font-black text-[#bf9b30] mb-6 pb-4 border-b flex items-center gap-2">
            AGREGAR PONENTE
        </h2>
        <form action="{{ route('add-ponente', ['evento_id' => $evento_id]) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Seleccionar Ponente</label>
                <div class="relative">
                    <select name="ponente" class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#bf9b30] outline-none bg-gray-50 text-gray-700 appearance-none transition-colors">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->paternal_surname }} {{ $user->maternal_surname }} {{ $user->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('ponente')
                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Título de la Ponencia</label>
                <input type="text" name="ponencia" placeholder="Ej: Introducción a la Teología Sistemática..." 
                       class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#bf9b30] outline-none bg-gray-50 text-gray-700 transition-colors"
                       required>
                @error('ponencia')
                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-4 pt-6 border-t mt-8">
                <a href="{{ route('evento', ['evento_id' => $evento_id]) }}" class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-100 transition-colors uppercase text-sm flex items-center">
                    Cancelar
                </a>
                <button type="submit" class="px-8 py-2 rounded-lg font-bold text-[#001529] bg-[#bf9b30] hover:bg-[#a38426] shadow-md transition-all uppercase text-sm hover:-translate-y-0.5 flex items-center gap-2">
                    <span>GUARDAR PONENTE</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('contenido')
<div class="max-w-4xl mx-auto p-6 animate-fade-in-down">
    <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#003366] p-8">
        <h2 class="text-2xl font-black text-[#003366] mb-6 pb-4 border-b">
            AGREGAR ASISTENTE
        </h2>
        
        <form action="{{ route('post-add-asistente', ['evento_id' => $evento_id]) }}" method="POST" class="space-y-6">
            @csrf
            <div class="border-none">
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Seleccionar Usuario</label>
                <select name="asistente" class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->paternal_surname }} {{ $user->maternal_surname }} {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex justify-end gap-4 pt-6 border-t">
                <a href="{{ route('evento', ['evento_id' => $evento_id]) }}" class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-100 transition-colors uppercase text-sm">
                    Cancelar
                </a>
                <button type="submit" class="px-8 py-2 rounded-lg font-bold text-white bg-[#003366] hover:bg-[#002244] shadow-md transition-all uppercase text-sm">
                    Guardar Asistente
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
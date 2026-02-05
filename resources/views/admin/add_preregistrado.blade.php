@extends('layouts.admin')
@section('contenido')
<div class="max-w-4xl mx-auto p-6 animate-fade-in-down">
    <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#bf9b30] p-8">
        <h2 class="text-2xl font-black text-[#bf9b30] mb-6 border-b pb-4 flex items-center gap-2">
            <span class="text-3xl">📝</span> AGREGAR PRE-INSCRITO
        </h2>
        
        <form action="{{ route('post-add-preregistrado', ['evento_id' => $evento_id]) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Seleccionar Usuario</label>
                <select name="preregistrado" class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#bf9b30] outline-none bg-gray-50 text-gray-700">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->paternal_surname }} {{ $user->maternal_surname }} {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">Se agregará a la lista de pre-inscritos.</p>
            </div>
            
            <div class="flex justify-end gap-4 pt-6 border-t">
                <a href="{{ route('evento', ['evento_id' => $evento_id]) }}" class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-100 transition-colors uppercase text-sm flex items-center">
                    Cancelar
                </a>
                <button type="submit" class="px-8 py-2 rounded-lg font-bold text-[#001529] bg-[#bf9b30] hover:bg-[#a38426] shadow-md transition-all uppercase text-sm">
                    Guardar Pre-inscrito
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
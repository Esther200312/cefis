@extends('layouts.admin')
@section('contenido')
<div class="max-w-4xl mx-auto p-6 animate-fade-in-down">
    <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#003366] p-8">
        <h2 class="text-2xl font-black text-[#003366] mb-8 uppercase tracking-tight border-b pb-4">
            Crear Nuevo Evento
        </h2>
        <form action="{{ route('add-evento') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Nombre del Evento</label>
                <input type="text" name="name" required placeholder="Ej: Congreso Nacional de Sistemas 2026"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700 transition-colors">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Fecha</label>
                    <input type="date" name="fecha" required
                        class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700 transition-colors">
                </div>
                <div>
                    <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">Dirección / Lugar</label>
                    <input type="text" name="address" required placeholder="Ej: Auditorio Principal UNCP"
                        class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700 transition-colors">
                </div>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2 uppercase text-sm">URL del Evento (Opcional)</label>
                <input type="url" name="url" placeholder="https://..."
                    class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-[#003366] outline-none bg-gray-50 text-gray-700 transition-colors">
            </div>
            <div class="flex justify-end gap-4 mt-8 pt-4 border-t border-gray-100">
                <a href="{{ route('dashboard') }}" class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-100 transition-colors uppercase text-sm flex items-center">
                    Cancelar
                </a>
                <button type="submit" class="px-8 py-2 rounded-lg font-bold text-white bg-[#003366] hover:bg-[#002244] shadow-md transition-all uppercase text-sm">
                    Guardar Evento
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('contenido')
<div class="max-w-7xl mx-auto p-4 sm:p-6 animate-fade-in-down">
    <div class="text-center py-8 mb-4">
        <h1 class="text-2xl md:text-3xl font-black text-[#003366] uppercase tracking-widest drop-shadow-sm">
            Bienvenido <span class="text-[#bf9b30]">Administrador</span>
        </h1>
    </div>
    <div class="flex justify-end px-4 mb-8">
        <a href="{{ route('add-evento') }}" 
           class="px-8 py-3 bg-[#bf9b30] text-[#001529] font-black uppercase tracking-widest text-sm rounded-full shadow-lg hover:bg-[#a38426] hover:scale-105 transition-all duration-300 flex items-center gap-2">
            <span>Agregar Evento</span>
        </a>
    </div>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 px-4 pb-12 max-w-7xl mx-auto">
        @foreach ($eventos as $evento)
        <div class="group relative bg-white p-6 rounded-xl shadow-md border-l-[6px] border-gray-200 hover:border-[#bf9b30] hover:-translate-y-1 hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="absolute -right-6 -bottom-6 text-gray-100 group-hover:text-gray-50 transition-colors pointer-events-none">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
            </div>
            <div class="flex items-center justify-between relative z-10">
                <div class="pr-4 flex-1">
                    <a href="{{ route('evento', ['evento_id'=>$evento->id]) }}" class="block">
                        <h3 class="text-lg font-black text-[#003366] group-hover:text-[#bf9b30] transition-colors uppercase tracking-tight leading-snug hover:underline">
                            {{ $evento->name }}
                        </h3>
                    </a>
                    <span class="inline-block mt-2 text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-1 rounded-md tracking-widest uppercase">
                        Evento Activo
                    </span>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button onclick="abrirModalRenombrar('{{ $evento->id }}', '{{ $evento->name }}')" 
                            class="w-8 h-8 rounded-full bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-300" title="Editar Nombre">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    </button>
                    <button onclick="abrirModalEliminar('{{ route('eliminar-evento', ['id' => $evento->id]) }}')" 
                            class="w-8 h-8 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300" title="Eliminar Evento">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                    <a href="{{ route('evento', ['evento_id'=>$evento->id]) }}" 
                       class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-[#bf9b30] group-hover:text-white group-hover:border-[#bf9b30] transition-all duration-300" title="Ir al Panel">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="modalRenombrar" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-t-8 border-[#003366]">
            <form id="formRenombrar" action="" method="POST">
                @csrf
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <h3 class="text-xl font-black text-[#003366] uppercase mb-4">Renombrar Evento</h3>
                    <input type="text" name="nombre" id="inputNombreEvento" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700 focus:border-[#003366] outline-none font-bold uppercase" required>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                    <button type="submit" class="inline-flex w-full justify-center rounded-lg bg-[#003366] px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-[#002244] transition-all sm:ml-3 sm:w-auto uppercase">Guardar</button>
                    <button type="button" onclick="cerrarModal('modalRenombrar')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-5 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all sm:mt-0 sm:w-auto uppercase">Cancelar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div id="modalEliminar" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-t-8 border-red-600">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 text-center sm:text-left">
                <h3 class="text-xl font-black text-red-600 uppercase mb-2">¿Eliminar Evento?</h3>
                <p class="text-sm text-gray-500">Esta acción borrará el evento y todos sus datos asociados. No se puede deshacer.</p>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                <a id="btnConfirmarEliminar" href="#" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-red-700 transition-all sm:ml-3 sm:w-auto uppercase">Sí, Eliminar</a>
                <button type="button" onclick="cerrarModal('modalEliminar')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-5 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all sm:mt-0 sm:w-auto uppercase">Cancelar</button>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    function abrirModalRenombrar(id, nombreActual) {
        document.getElementById('inputNombreEvento').value = nombreActual;
        let url = "{{ route('renombrar-evento', ['id' => 'ID_PLACEHOLDER']) }}";
        document.getElementById('formRenombrar').action = url.replace('ID_PLACEHOLDER', id);
        document.getElementById('modalRenombrar').classList.remove('hidden');
    }
    function abrirModalEliminar(url) {
        document.getElementById('btnConfirmarEliminar').href = url;
        document.getElementById('modalEliminar').classList.remove('hidden');
    }
    function cerrarModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

@endsection
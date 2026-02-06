@extends('layouts.admin')
@section('contenido')

<div class="p-4 sm:p-6 w-full max-w-7xl mx-auto space-y-6 animate-fade-in-down mt-0">
    
    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm border-l-4 border-[#003366] flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">
            
            <h1 class="text-xl sm:text-2xl font-black text-[#003366] uppercase tracking-tight leading-tight">
                {{ $evento->name }}
            </h1>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('admin-certificados', ['evento_id' => $evento_id]) }}" class="text-center px-4 py-2 bg-[#003366] text-white font-bold text-xs uppercase rounded shadow hover:bg-[#002244] transition-all whitespace-nowrap">
                VER CERTIFICADOS
            </a>
            <a href="{{ route('add-certificado-base', ['evento_id' => $evento_id]) }}" class="text-center px-4 py-2 bg-[#bf9b30] text-[#001529] font-bold text-xs uppercase rounded shadow hover:bg-[#a38426] transition-all whitespace-nowrap">
                CERTIFICADO BASE
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-[#003366] flex flex-col">
            <div class="bg-white px-4 sm:px-6 py-4 border-b flex justify-between items-center flex-wrap gap-2">
                <h3 class="font-bold text-[#003366] uppercase text-sm sm:text-base">ORGANIZADORES</h3>
                <div class="flex gap-2">
                    <a href="{{ route('add-organizador', ['evento_id' => $evento_id]) }}" class="bg-[#003366] text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#002244] transition-colors">+ AGREGAR</a>
                    <a href="{{ route('exportar-organizadores', ['evento_id' => $evento_id]) }}" class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-green-700 transition-colors">EXPORTAR</a>
                </div>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-80 overflow-y-auto">
                @foreach ($organizadores as $organizador)
                <li class="py-3 flex items-center justify-between group hover:bg-gray-50 px-2 rounded transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-2 h-2 rounded-full bg-[#003366] shrink-0"></div>
                        <span class="text-xs font-bold text-gray-700 uppercase truncate">
                            {{ $organizador->paternal_surname }} {{ $organizador->maternal_surname }} {{ $organizador->name }}
                        </span>
                    </div>
                    <div class="pl-2 lg:hidden lg:group-hover:block shrink-0">
                        <button onclick="confirmarEliminar('{{ route('eliminar-participante', ['evento_id'=>$evento_id, 'user_id'=>$organizador->id, 'tipo_id'=>4]) }}', 'Organizador')" 
                                class="text-red-400 hover:text-red-600 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-[#bf9b30] flex flex-col">
            <div class="bg-[#fffdf5] px-4 sm:px-6 py-4 border-b flex justify-between items-center flex-wrap gap-2">
                <h3 class="font-bold text-[#bf9b30] uppercase text-sm sm:text-base">PONENTES</h3>
                <a href="{{ route('add-ponente', ['evento_id' => $evento_id]) }}" class="bg-[#bf9b30] text-[#001529] px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#a38426] transition-colors">+ AGREGAR</a>
            </div>
            
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-80 overflow-y-auto">
                @foreach ($ponentes as $ponente)
                <li class="py-3 group hover:bg-[#fffdf5] px-2 rounded transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col w-full min-w-0">
                            <div class="flex items-center gap-3 mb-1 min-w-0">
                                <div class="w-2 h-2 rounded-full bg-[#bf9b30] shrink-0"></div>
                                <span class="text-xs font-black text-gray-800 uppercase truncate">
                                    {{ $ponente->paternal_surname }} {{ $ponente->maternal_surname }} {{ $ponente->name }}
                                </span>
                            </div>
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded ml-5 uppercase w-fit truncate max-w-[90%]">
                                Tema: {{ $ponente->pivot->ponencia }}
                            </span>
                        </div>
                        <div class="flex lg:hidden lg:group-hover:flex items-center gap-1 ml-2 shrink-0">
                            <button onclick="editarPonencia('{{ $ponente->id }}', '{{ $ponente->pivot->ponencia }}')" 
                                    class="text-blue-400 hover:text-blue-600 p-1 bg-white rounded shadow-sm border border-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </button>
                            <button onclick="confirmarEliminar('{{ route('eliminar-participante', ['evento_id'=>$evento_id, 'user_id'=>$ponente->id, 'tipo_id'=>3]) }}', 'Ponente')"
                                    class="text-red-400 hover:text-red-600 p-1 bg-white rounded shadow-sm border border-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-[#003366] flex flex-col">
            <div class="bg-white px-4 sm:px-6 py-4 border-b flex justify-between items-center flex-wrap gap-2">
                <h3 class="font-bold text-[#003366] uppercase text-sm sm:text-base">ASISTENTES</h3>
                <a href="{{ route('get-add-asistente', ['evento_id' => $evento_id]) }}" class="bg-[#003366] text-white px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#002244] transition-colors">+ AGREGAR</a>
            </div>
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-60 overflow-y-auto">
                @foreach ($asistentes as $asistente)
                <li class="py-3 flex items-center justify-between group hover:bg-gray-50 px-2 rounded transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-2 h-2 rounded-full bg-[#003366] shrink-0"></div>
                        <span class="text-xs font-bold text-gray-700 uppercase truncate">
                            {{ $asistente->paternal_surname }} {{ $asistente->maternal_surname }} {{ $asistente->name }}
                        </span>
                    </div>
                    <div class="lg:hidden lg:group-hover:block shrink-0">
                        <button onclick="confirmarEliminar('{{ route('eliminar-participante', ['evento_id'=>$evento_id, 'user_id'=>$asistente->id, 'tipo_id'=>2]) }}', 'Asistente')"
                                class="text-red-400 hover:text-red-600 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </li>
                @endforeach
                @if(count($asistentes) == 0)
                    <li class="text-center text-gray-400 text-xs italic py-4">Aún no hay asistentes.</li>
                @endif
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-[#bf9b30] flex flex-col">
            <div class="bg-[#fffdf5] px-4 sm:px-6 py-4 border-b flex justify-between items-center flex-wrap gap-2">
                <h3 class="font-bold text-[#bf9b30] uppercase text-sm sm:text-base">PRE-INSCRITOS</h3>
                <a href="{{ route('get-add-preregistrado', ['evento_id' => $evento_id]) }}" class="bg-[#bf9b30] text-[#001529] px-3 py-1 rounded text-xs font-bold uppercase hover:bg-[#a38426] transition-colors">+ AGREGAR</a>
            </div>
            <ul class="divide-y divide-gray-100 bg-white p-4 max-h-60 overflow-y-auto">
                @foreach ($preregistrados as $preregistrado)
                <li class="py-3 flex items-center justify-between group hover:bg-[#fffdf5] px-2 rounded transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-2 h-2 rounded-full bg-[#bf9b30] shrink-0"></div>
                        <span class="text-xs font-bold text-gray-700 uppercase truncate">
                            {{ $preregistrado->paternal_surname }} {{ $preregistrado->maternal_surname }} {{ $preregistrado->name }}
                        </span>
                    </div>
                    <div class="lg:hidden lg:group-hover:block shrink-0">
                        <button onclick="confirmarEliminar('{{ route('eliminar-participante', ['evento_id'=>$evento_id, 'user_id'=>$preregistrado->id, 'tipo_id'=>1]) }}', 'Pre-inscrito')"
                                class="text-red-400 hover:text-red-600 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </li>
                @endforeach
                @if(count($preregistrados) == 0)
                    <li class="text-center text-gray-400 text-xs italic py-4">No hay pre-registrados.</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<form id="formEditarPonencia" action="" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="ponencia_titulo" id="inputPonenciaTitulo">
</form>

<div id="modalEditar" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-t-8 border-[#bf9b30]">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-amber-50 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-[#bf9b30]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                <h3 class="text-xl font-black leading-6 text-[#003366] uppercase">Editar Título</h3>
                <div class="mt-4">
                  <input type="text" id="inputModalTitulo" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700 focus:border-[#bf9b30] focus:ring-0 outline-none transition-all font-medium" placeholder="Escribe el título aquí..." onkeyup="verificarEnter(event)">
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
            <button type="button" onclick="guardarCambiosModal()" class="inline-flex w-full justify-center rounded-lg bg-[#003366] px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-[#002244] transition-all sm:ml-3 sm:w-auto uppercase">Guardar</button>
            <button type="button" onclick="cerrarModal('modalEditar')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-5 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all sm:mt-0 sm:w-auto uppercase">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
</div>

<div id="modalEliminar" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-t-8 border-red-500">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-xl font-black leading-6 text-gray-900 uppercase">¿Eliminar Participante?</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Estás a punto de eliminar a este <strong id="textoRolEliminar" class="text-red-600">Participante</strong> de la lista. Esta acción no se puede deshacer.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
            <a id="btnConfirmarEliminar" href="#" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-red-700 transition-all sm:ml-3 sm:w-auto uppercase">
                Sí, Eliminar
            </a>
            <button type="button" onclick="cerrarModal('modalEliminar')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-5 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all sm:mt-0 sm:w-auto uppercase">
                Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    let usuarioIdActual = null;
    function editarPonencia(userId, tituloActual) {
        usuarioIdActual = userId;
        const input = document.getElementById('inputModalTitulo');
        input.value = tituloActual;
        document.getElementById('modalEditar').classList.remove('hidden');
        setTimeout(() => input.focus(), 100);
    }
    function guardarCambiosModal() {
        const nuevoTitulo = document.getElementById('inputModalTitulo').value;
        if (nuevoTitulo.trim() === "") { alert("El título no puede estar vacío."); return; }
        if (usuarioIdActual) {
            let form = document.getElementById('formEditarPonencia');
            let inputHidden = document.getElementById('inputPonenciaTitulo');
            let urlBase = "{{ route('actualizar-ponencia', ['user_id' => 'ID_PLACEHOLDER', 'evento_id' => $evento_id]) }}";
            form.action = urlBase.replace('ID_PLACEHOLDER', usuarioIdActual);
            inputHidden.value = nuevoTitulo;
            form.submit();
        }
    }
    function confirmarEliminar(urlEliminar, rolNombre) {
        document.getElementById('btnConfirmarEliminar').href = urlEliminar;
        document.getElementById('textoRolEliminar').textContent = rolNombre;
        document.getElementById('modalEliminar').classList.remove('hidden');
    }
    function cerrarModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        if(modalId === 'modalEditar') usuarioIdActual = null;
    }
    function verificarEnter(event) {
        if (event.key === "Enter") guardarCambiosModal();
    }
</script>

@endsection
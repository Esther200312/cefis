@extends('layouts.admin')
@section('contenido')

<div class="p-6 max-w-7xl mx-auto space-y-6 animate-fade-in-down">

    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-[#bf9b30] flex justify-between items-center">
        <div>
            <h1 class="text-2xl md:text-3xl font-black text-[#003366] uppercase tracking-tight">
                CARGAR CERTIFICADO BASE
            </h1>
            <p class="text-[#bf9b30] font-bold text-sm uppercase mt-1 tracking-widest">
                (Plantilla de Fondo)
            </p>
        </div>
        </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg border-t-4 border-[#003366] overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold text-[#003366] uppercase text-sm">Subir Nuevo Archivo</h3>
            </div>
            
            <div class="p-8">
                <form method="post" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="base" class="block font-bold text-gray-700 text-sm uppercase mb-2">
                            Selecciona el archivo:
                        </label>
                        
                        <input type="file" name="base" id="base" required accept="image/*,.pdf"
                               class="block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2.5 file:px-4
                                      file:rounded-l-md file:border-0
                                      file:text-sm file:font-bold file:uppercase
                                      file:bg-[#003366] file:text-white
                                      hover:file:bg-[#bf9b30] hover:file:text-[#001529]
                                      border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:border-[#bf9b30] transition-all" />
                    </div>

                    @error('base')
                    <div class="mt-2 text-red-600 text-xs font-bold uppercase flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-4">
                        <a href="{{ route('evento', ['evento_id' => $evento_id]) }}" class="text-gray-400 font-bold text-xs uppercase hover:text-gray-700 transition-colors">
                            Cancelar
                        </a>

                        <button type="submit" class="px-6 py-2.5 bg-[#003366] text-white font-bold text-xs uppercase rounded shadow hover:bg-[#bf9b30] hover:text-[#001529] transition-all flex items-center gap-2">
                            <span>CARGAR CERTIFICADO</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#bf9b30] overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold text-[#bf9b30] uppercase text-sm">Vista Previa</h3>
            </div>
            <div class="p-6 flex justify-center bg-gray-100 min-h-[200px] items-center">
                <img id="preview-image" src="#" alt="Vista previa" class="max-w-full max-h-64 rounded shadow-sm hidden border border-gray-200">
                
                <div id="preview-placeholder" class="text-gray-400 text-xs font-bold uppercase text-center">
                    Sin archivo seleccionado
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // Script simple para vista previa
    document.getElementById('base').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('preview-image');
                img.src = e.target.result;
                img.classList.remove('hidden');
                document.getElementById('preview-placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('preview-image').classList.add('hidden');
            document.getElementById('preview-placeholder').classList.remove('hidden');
            if(file) {
                 document.getElementById('preview-placeholder').textContent = "Archivo seleccionado: " + file.name;
            }
        }
    });
</script>

@endsection
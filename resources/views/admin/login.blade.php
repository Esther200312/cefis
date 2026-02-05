@extends('layouts.admin')

@section('contenido')
<div class="absolute inset-0 w-full h-full flex items-center justify-center overflow-hidden" 
     style="background-color: #f1f5f9; background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1600 800%22 preserveAspectRatio=%22none%22%3E%3Cpath fill=%22%23cbd5e1%22 opacity=%220.4%22 d=%22M0 0l600 200L0 500z%22/%3E%3Cpath fill=%22%2394a3b8%22 opacity=%220.2%22 d=%22M1600 800l-600-200 600-300z%22/%3E%3Cpath fill=%22%23e2e8f0%22 opacity=%220.5%22 d=%22M0 800l800-400 800 400z%22/%3E%3Cpath fill=%22%23cbd5e1%22 opacity=%220.3%22 d=%22M1600 0L1000 300 1600 600z%22/%3E%3C/svg%3E'); background-size: cover; background-attachment: fixed;">

    <form method="POST" action="{{ route('login') }}" class="relative z-10 w-full max-w-sm bg-white p-8 rounded-2xl shadow-2xl space-y-6 border border-slate-100">
        @csrf

        <div>
            <label class="block text-gray-700 font-bold mb-1 ml-1 text-sm">Email:</label>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-400 transition-all shadow-sm">
                <div class="bg-gray-100 p-3 border-r border-gray-300 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input type="email" name="email" placeholder="ejemplo@uncp.edu.pe" class="w-full py-3 px-4 text-gray-700 outline-none placeholder-gray-400" value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
                <p class="text-red-500 text-xs italic mt-1 ml-1 font-bold">{{ $message }}</p>
            @enderror
        </div>
<div class="mb-6">
    <label class="block text-gray-700 font-bold mb-1 ml-1 text-sm">Password:</label>
    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-400 transition-all shadow-sm bg-white">
        <div class="bg-gray-100 p-3 border-r border-gray-300 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <input 
            type="password" 
            name="password" 
            id="password" 
            placeholder="********" 
            class="flex-1 py-3 px-4 text-gray-700 outline-none placeholder-gray-400 bg-transparent" 
            required>
       <button type="button" onclick="togglePassword()" class="p-3 text-gray-400 hover:text-blue-600 transition-colors cursor-pointer focus:outline-none bg-white hover:bg-gray-50 ">
                    <svg id="eye-icon-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eye-icon-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.059 10.059 0 011.591-2.772m0 0l2.345 2.345m-2.345-2.345L3.999 5m0 0l3.05 3.05m0 0l3.75 3.75m0 0l3.75 3.75M19.05 19.05l-3.75-3.75m3.75 3.75l2.25 2.25m-2.25-2.25l-2.036-2.035M20.25 10.5a9.96 9.96 0 00-1.74-2.5m-.01-4.75L21.249 5m-2.75 4.75l2.25-2.25m-6.24 6.24l-2.036-2.035" />
                    </svg>
                </button>
            </div>
            
            @error('password')
                <p class="text-red-500 text-xs italic mt-1 ml-1 font-bold">{{ $message }}</p>
            @enderror
        </div>
<script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const eyeOpen = document.getElementById('eye-icon-open');
                const eyeClosed = document.getElementById('eye-icon-closed');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text'; 
                    eyeOpen.classList.remove('hidden');
                    eyeClosed.classList.add('hidden');
                } else {
                    passwordInput.type = 'password'; 
                    eyeOpen.classList.add('hidden');
                    eyeClosed.classList.remove('hidden');
                }
            }
        </script>

        <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-bold rounded-full shadow-lg transform transition hover:-translate-y-0.5 tracking-widest uppercase">
            INGRESAR
        </button>
    </form>
</div>
@endsection
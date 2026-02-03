<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (! $user) { return back()->withErrors(['email' => 'El email no existe'])->onlyInput('email'); }
        if (! $user->isAn('admin')) {return back()->withErrors(['email' => 'Solo para administradores'])->onlyInput('email');}
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { $request->session()->regenerate();return redirect()->route('dashboard'); }
        return back()->withErrors([ 'password' => 'La contraseña es incorrecta' ])->onlyInput('email');
    }

    public function getLogin()
    {
        return view('admin.login');
    }
    public function logout(Request $request)
    {
        // 2. Cerrar sesión en el guard
        Auth::logout();
        // 3. Invalidar la sesión del usuario
        $request->session->invalidate();
        // 4. Regenerarel token CSRF para evitar ataques
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

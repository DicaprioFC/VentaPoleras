<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('usuarios')->where('usuario', $request->usuario)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('id', $user->id);
            Session::put('usuario', $user->usuario);
            Session::put('rol', $user->rol);

            if ($user->rol === 'admin') {
                return redirect('admin');
            } else {
                return redirect('cliente');
            }
        }

        return back()->with('error', '⚠️ Usuario o contraseña incorrectos.');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}

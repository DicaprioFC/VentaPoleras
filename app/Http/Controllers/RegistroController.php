<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function showForm()
    {
        return view('registro');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'ci' => 'required|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'required|email|unique:usuarios,correo',
            'usuario' => 'required|string|unique:usuarios,usuario|max:255',
            'rol' => 'required|in:cliente,admin',
            'password' => 'required|min:6',
        ]);

        DB::table('usuarios')->insert([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'usuario' => $request->usuario,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}

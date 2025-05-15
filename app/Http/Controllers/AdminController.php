<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showForm()
    {
        // Verificar si el usuario tiene rol de admin
        if (Session::get('rol') !== 'admin') {
            return redirect('/login');
        }

        return view('admin');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'marca' => 'required|string',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $marca = $request->input('marca') === 'otras' ? $request->input('otraMarca') : $request->input('marca');

    // Similar a PHP: mueve imagen manualmente a /public/imagenes/
    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('imagenes'); // esto apunta a /public/imagenes
        $file->move($destinationPath, $fileName);
        $rutaImagen = 'imagenes/' . $fileName;
    } else {
        return back()->with('error', '❌ Error al subir la imagen.');
    }

    DB::table('productos')->insert([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
        'marca' => $marca,
        'imagen' => $rutaImagen,
        'id_usuario' => Session::get('id'), // Asegúrate que exista
    ]);

    return redirect()->route('admin')->with('success', '✅ Producto agregado exitosamente.');
}

}

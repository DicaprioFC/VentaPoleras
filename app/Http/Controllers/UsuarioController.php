<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')->get();
        $usuario = Session::get('usuario');

        return view('usuarios/usuario', compact('productos', 'usuario'));
    }

    public function productosNike()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Nike')
            ->get();

        return view('usuarios/nikeusuario', compact('productos'));
    }


    public function productosAdidas()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Adidas')
            ->get();

        return view('usuarios/adidasusuario', compact('productos'));
    }

    public function productosMarathon()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Marathon')
            ->get();

        return view('usuarios/marathonusuario', compact('productos'));
    }

    public function productosMarcaMarathon()
    {
        $productos = DB::table('productos')
            ->where('marca', 'MarcaMarathon')
            ->get();

        return view('usuarios/marcamarausu', compact('productos'));
    }

    public function productosMarcaNike()
    {
        $productos = DB::table('productos')
            ->where('marca', 'MarcaNike')
            ->get();

        return view('usuarios/marcanikeusu', compact('productos'));
    }

    public function productosOtrasMarcas()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Otras')
            ->get();

        return view('usuarios/otrasmarcasusu', compact('productos'));
    }
}

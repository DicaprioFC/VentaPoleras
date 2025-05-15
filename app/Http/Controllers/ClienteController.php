<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')->get();
        $usuario = Session::get('usuario');

        return view('cliente', compact('productos', 'usuario'));
    }

    public function productosNike()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Nike')
            ->get();

        return view('nikecliente', compact('productos'));
    }

    public function productosAdidas()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Adidas')
            ->get();

        return view('adidascliente', compact('productos'));
    }
    public function productosMarathon()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Marathon')
            ->get();

        return view('marathoncliente', compact('productos'));
    }
    public function productosMarcaMarathon()
    {
        $productos = DB::table('productos')
            ->where('marca', 'MarcaMarathon')
            ->get();

        return view('marcamaracli', compact('productos'));
    }
    public function productosMarcaNike()
    {
        $productos = DB::table('productos')
            ->where('marca', 'MarcaNike')
            ->get();

        return view('marcanikecli', compact('productos'));
    }
    public function productosOtrasMarcas()
    {
        $productos = DB::table('productos')
            ->where('marca', 'Otras')
            ->get();

        return view('otrasmarcas', compact('productos'));
    }
}

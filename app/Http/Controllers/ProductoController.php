<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function porMarca()
    {
        // Obtener las marcas distintas
        $marcas = DB::table('productos')
            ->select('marca')
            ->distinct()
            ->orderBy('marca')
            ->get();

        // Obtener productos agrupados por marca
        $productosPorMarca = [];
        foreach ($marcas as $marca) {
            $productos = DB::table('productos')
                ->where('marca', $marca->marca)
                ->orderByDesc('id')
                ->get();

            $productosPorMarca[$marca->marca] = $productos;
        }

        return view('productos', compact('productosPorMarca'));
    }
}

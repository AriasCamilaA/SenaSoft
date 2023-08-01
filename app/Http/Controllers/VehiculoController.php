<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehiculo;
use App\Models\Categoria;

class VehiculoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $vehiculos = Vehiculo::with(['categoria', 'datosPersonales.usuario'])->get();
        return view('home', compact('vehiculos', 'categorias'));
    }

    public function filtrarPorCategoria($cat_id)
    {
        $categoria = Categoria::findOrFail($cat_id);
        $vehiculos = $categoria->vehiculos;
        $categorias = Categoria::all();
        return view('categoria', compact('vehiculos', 'categoria', 'categorias'));
    }
}

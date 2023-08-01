<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehiculo;
use App\Models\Categoria;

class VehiculoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $precioMinimo = $request->filled('precio_minimo') ? $request->input('precio_minimo') : 0;
        $precioMaximo = $request->filled('precio_maximo') ? $request->input('precio_maximo') : Vehiculo::max('veh_precio');
        $categoriaId = $request->input('categoria');

        $query = Vehiculo::with(['categoria', 'datosPersonales.usuario'])
            ->whereBetween('veh_precio', [$precioMinimo, $precioMaximo]);

        if ($categoriaId) {
            $query->where('cat_id_fk', $categoriaId);
        }

        $vehiculos = $query->get();

        return view('home', compact('vehiculos', 'categorias', 'precioMinimo', 'precioMaximo', 'categoriaId', 'request'));
    }

}

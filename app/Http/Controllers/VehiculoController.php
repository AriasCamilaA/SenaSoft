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
        // Obtememos el valor que esta en los input para el filtro de precio
        $precioMinimo = $request->filled('precio_minimo') ? $request->input('precio_minimo') : 0; // Si no se ingresa toma 0
        $precioMaximo = $request->filled('precio_maximo') ? $request->input('precio_maximo') : Vehiculo::max('veh_precio'); // Si no se ingresa toma el máximo de mi tabla
        $categoriaId = $request->input('categoria');

        // Almacenamos los datos de vehículo, categoría, datos personales en el rango de los precios
        $query = Vehiculo::with(['categoria', 'datosPersonales.usuario'])
            ->whereBetween('veh_precio', [$precioMinimo, $precioMaximo]);

        // Filtramos dado un id de categoría
        if ($categoriaId) {
            $query->where('cat_id_fk', $categoriaId);
        }

        $vehiculos = $query->get();

        // Finalmente retornamos todos estos datos para poder utilizarlo en mi home que muestra la tabla de vehiculos con filtros
        return view('home', compact('vehiculos', 'categorias', 'precioMinimo', 'precioMaximo', 'categoriaId', 'request'));
    }

    public function create()
    {
        // Acá tomamos las categorias para que puedan ser utilizadas al momento de agregar el vehículos
        $categorias = Categoria::all();
        return view('agregar_vehiculo', compact('categorias'));
    }

    public function store(Request $request)
{
    // Agregamos el nuevo vehículo
    $vehiculo = new Vehiculo;
    $vehiculo->veh_placa=$request->input('veh_placa');
    $vehiculo->veh_modelo=$request->input('veh_modelo');
    $vehiculo->veh_marca=$request->input('veh_marca');
    $vehiculo->veh_color=$request->input('veh_color');
    $vehiculo->veh_estado=$request->input('veh_estado');
    $vehiculo->veh_precio=$request->input('veh_precio');
    $vehiculo->cat_id_fk=$request->input('cat_id_fk');
    $vehiculo->data_id_fk=$request->input('data_id_fk');
    $vehiculo->save();

    return redirect()->route('vehiculos.index')->with('success', 'Vehículo Agregado correctamente!');
}
}

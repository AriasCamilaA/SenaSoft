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

    public function create()
    {
        $categorias = Categoria::all();
        // Aquí puedes agregar la lógica necesaria para mostrar el formulario de agregar vehículo
        return view('agregar_vehiculo', compact('categorias')); // Reemplaza 'agregar_vehiculo' con el nombre de tu vista para agregar vehículos
    }

    public function store(Request $request)
{
    // Validate the input data
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

    return redirect()->route('vehiculos.index')->with('success', 'Vehicle added successfully!');
}
}

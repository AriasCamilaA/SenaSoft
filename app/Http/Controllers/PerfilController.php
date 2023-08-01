<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('editar_perfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $datosPersonales = $user->datosPersonales;

        // Validation rules for the form fields
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            // Add more validation rules for other fields
        ]);

        // Update the user's profile data
        $datosPersonales->update([
            'data_nombre' => $request->input('nombre'),
            'data_apellido' => $request->input('apellido'),
            'data_telefono' => $request->input('telefono'),
            'data_correo' => $request->input('correo'),
            // Update more fields as needed
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
    }

}

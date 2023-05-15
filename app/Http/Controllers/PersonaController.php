<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();

        return response()->json($personas);
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        return response()->json($persona);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fechanac' => 'required|date',
            'estadocivil' => 'required',
        ]);

        $persona = Persona::create($request->all());

        return response()->json($persona, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fechanac' => 'required|date',
            'estadocivil' => 'required',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return response()->json($persona, 200);
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return response()->json(null, 204);
    }
}

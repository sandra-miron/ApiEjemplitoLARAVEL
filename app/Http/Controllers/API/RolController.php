<?php

namespace App\Http\Controllers\API;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    public function index()
    {
        return Rol::all();
    }

        public function store(Request $request)
        {
            $request->validate([
                'nombre' => 'required|max:50',
                'descripcion' => 'nullable|max:100'
            ]);

            return Rol::create($request->all());
        }

    public function show($id)
    {
        return Rol::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return $rol;
    }

    public function destroy($id)
    {
        Rol::destroy($id);
        return response()->json(['message' => 'Rol eliminado']);
    }


}


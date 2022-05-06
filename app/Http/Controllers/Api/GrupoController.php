<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\Models\Grupo;

class GrupoController extends GeneralController {

    public function index() {
        return view('layouts.grupo');
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'semestre'     => 'required|string|max:30',
                'grupo'        => 'required|string|max:25',
                'turno'        => 'required|string|max:20'
            ]);

            Grupo::create([
                'semestre'     => $validatedData['semestre'],
                'grupo'        => $validatedData['grupo'],
                'turno'        => $validatedData['turno']
            ]);

            return $this->sendResponse('Success', 'Grupo agregado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function show() {
        try {
            $result = Grupo::all();
            return $this->sendResponse($result, 'Lista de grupos');
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }

    public function edit(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Grupo::findOrFail([
                'id' => $validatedData['id']
            ]);
            return $this->sendResponse($result, 'Editar Grupo');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function update(Request $request) {
        try {
            $validatedData = $request->validate([
                'semestre'     => 'required|string|max:30',
                'grupo'        => 'required|string|max:25',
                'turno'        => 'required|string|max:20',
                'id'           => 'required|integer'
            ]);

            $form_data = array(
                'semestre' => $validatedData['semestre'],
                'grupo'    => $validatedData['grupo'],
                'turno'    => $validatedData['turno']
            );

            Grupo::whereId($validatedData['id'])->update($form_data);

            return $this->sendResponse('Success', 'Grupo actualizado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function destroy(Request $request) {
        try {
            $result = Grupo::findOrFail($request->id);
            $result->delete();
            return $this->sendResponse('Success', 'Se ha eliminado un grupo.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th, 'No fue posible eliminar este grupo.');
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\Models\Estudiante;

class EstudianteController extends GeneralController {

    public function index() {
        return view('layouts.estudiante');
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'nombre'    => 'required|string|max:30',
                'apellidos' => 'required|string|max:100',
                'edad'      => 'required|integer',
                'email'     => 'required|email|max:255',
                'telefono'  => 'required|string'
            ]);

            Estudiante::create([
                'nombre'    => $validatedData['nombre'],
                'apellidos' => $validatedData['apellidos'],
                'edad'      => $validatedData['edad'],
                'email'     => $validatedData['email'],
                'telefono'  => $validatedData['telefono']
            ]);

            return $this->sendResponse('Success', 'Estudiante agregado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function show() {
        try {
            $result = Estudiante::all();
            return $this->sendResponse($result, 'Lista de estudiantes');
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }

    public function edit(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Estudiante::findOrFail([
                'id' => $validatedData['id']
            ]);
            return $this->sendResponse($result, 'Editar estudiante');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function update(Request $request) {
        try {
            $validatedData = $request->validate([
                'nombre'    => 'required|string|max:30',
                'apellidos' => 'required|string|max:100',
                'edad'      => 'required|integer',
                'email'     => 'required|email|max:255',
                'telefono'  => 'required|integer',
                'id'        => 'required|integer'
            ]);

            $form_data = array(
                'nombre'    => $validatedData['nombre'],
                'apellidos' => $validatedData['apellidos'],
                'edad'      => $validatedData['edad'],
                'email'     => $validatedData['email'],
                'telefono'  => $validatedData['telefono'],
            );

            Estudiante::whereId($validatedData['id'])->update($form_data);

            return $this->sendResponse('Success', 'Usuario actualizado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function destroy(Request $request) {
        try {
            $result = Estudiante::findOrFail($request->id);
            $result->delete();
            return $this->sendResponse('Success', 'Se ha eliminado un estudiante.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th, 'No fue posible eliminar a este estudiante.');
        }
    }

}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\Models\Estudiante;
use App\Models\EstudiantesGrupos;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;

class ConcentradoController extends GeneralController {

    public function index() {
        return view('layouts.concentrado');
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'id_estudiante' => 'required|integer',
                'id_grupo'      => 'required|integer',
            ]);

            EstudiantesGrupos::create([
                'id_estudiante' => $validatedData['id_estudiante'],
                'id_grupo'      => $validatedData['id_grupo'],
            ]);

            return $this->sendResponse('Success', 'Grupo agregado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function show() {
        try {
            $result = DB::table('estudiantes_grupos')
            ->join('estudiantes', 'estudiantes.id', '=', 'estudiantes_grupos.id_estudiante')
            ->join('grupos', 'grupos.id', '=', 'estudiantes_grupos.id_grupo')
            ->select(
                'estudiantes_grupos.id as id',
                'estudiantes.nombre as nombre',
                'estudiantes.id as id_estudiante',
                'grupos.semestre as semestre',
                'grupos.id as id_grupo',
                'grupos.grupo as grupo',
                'grupos.turno as turno'
            )
            ->orderBy('estudiantes.id', 'asc')
            ->get();
            return $this->sendResponse($result, 'Lista de estudiantes asignados a grupos');
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }

    public function edit(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = EstudiantesGrupos::findOrFail([
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
                'id_estudiante' => 'required|string',
                'id_grupo'      => 'required|string',
                'id'            => 'required|integer'
            ]);

            $form_data = array(
                'id_estudiante' => $validatedData['id_estudiante'],
                'id_grupo'      => $validatedData['id_grupo'],
            );

            EstudiantesGrupos::whereId($validatedData['id'])->update($form_data);

            return $this->sendResponse('Success', 'Grupo actualizado con exito.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th);
        }
    }

    public function destroy(Request $request) {
        try {
            $result = EstudiantesGrupos::findOrFail($request->id);
            $result->delete();
            return $this->sendResponse('Success', 'Se ha eliminado un grupo.');
        } catch (\Throwable $th) {
            throw $th;
            return $this->sendError($th, 'No fue posible eliminar este grupo.');
        }
    }

    public function listEstudiantes() {
        try {
            $result = Estudiante::all();
            return $this->sendResponse($result, 'Lista de estudiantes');
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }

    public function listGrupos() {
      try {
            $result = Grupo::all();
            return $this->sendResponse($result, 'Lista de estudiantes grupos');
        } catch (\Throwable $th) {
            return $this->sendError($th);
        }
    }
}

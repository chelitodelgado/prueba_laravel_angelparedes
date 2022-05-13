<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\EstudianteGrupo;
use App\Grupo;
use Illuminate\Http\Request;

class EstudianteGrupoController extends Controller
{
    public function listarConcentrado()
    {
        $estudiante = Estudiante::all();
        $grupo = Grupo::all();
        $estudiante_grupos = EstudianteGrupo::join('estudiantes', 'estudiantes.id', '=', 'estudiante_grupos.id_estudiante')
                            ->join('grupos', 'grupos.id', '=', 'estudiante_grupos.id_grupo')
                            ->select('estudiante_grupos.id as id',
                                     'estudiantes.nombre as nombre',
                                     'grupos.semestre as semestre',
                                     'grupos.grupo as grupo',
                                     'grupos.turno as turno')->orderBY('estudiantes.id', 'asc')->get();
        return view('estudiante_grupo.concentrado',[
            'estudiante' => $estudiante,
            'grupo' => $grupo,
            'estudiantes_grupos' => $estudiante_grupos
        ]);
    }

    public function insertarEstudianteGrupo(Request $request)
    {
        $validaciones = $this->validate($request,[
            'id_estudiante' => 'required|integer',
            'id_grupo'      => 'required|integer',
        ]);

        $estudiante_grupo = new EstudianteGrupo;
        $estudiante_grupo->id_estudiante = $request->id_estudiante;
        $estudiante_grupo->id_grupo      = $request->id_grupo;
        $estudiante_grupo->save();

        return redirect()->route('listar.estudiante_grupo')->with([
            'message' => 'Un nuevo estudiante fue asignado a un grupo correctamente'
        ]);

    }

    public function formularioEditarEstudianteGrupo($id)
    {
        $grupo = Grupo::all();
        $estudiante_grupo = EstudianteGrupo::find($id);
        $estudiante = Estudiante::find($estudiante_grupo->id_estudiante);
        return view('estudiante_grupo.editar-concentrado',[
            'estudiante' => $estudiante,
            'estudiante_grupo' => $estudiante_grupo,
            'grupo' => $grupo
        ]);
    }

    public function actualizarEstudianteGrupo(Request $request)
    {
        $validaciones = $this->validate($request,[
            'id'      => 'required|integer',
        ]);

        $estudiante_grupo = EstudianteGrupo::find($request->id);
        $estudiante_grupo->id_grupo = $request->id_grupo;
        $estudiante_grupo->update();

        return redirect()->route('listar.estudiante_grupo')->with([
            'message' => 'Un estudiante se actualizo correctamente'
        ]);
    }

    public function eliminarEstudianteGrupo($id)
    {
        $estudiante_grupos = EstudianteGrupo::find($id);
        $estudiante_grupos->delete();
        return redirect()->route('listar.estudiante_grupo')->with([
            'message' => 'Un estudiante se elimino correctamente'
        ]);
    }
}

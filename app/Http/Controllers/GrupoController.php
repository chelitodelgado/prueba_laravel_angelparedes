<?php

namespace App\Http\Controllers;

use App\EstudianteGrupo;
use App\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function listarGrupos()
    {
        $grupos = Grupo::all();
        return view('grupo.listar-grupos', ['grupos' => $grupos]);
    }

    public function formularioInsertarGrupo()
    {
        return view('grupo.crear-grupo');
    }

    public function formularioEditarGrupo($id)
    {
        $grupo = Grupo::find($id);
        return view('grupo.editar-grupo',['grupo' => $grupo]);
    }

    public function insertarGrupo(Request $request)
    {
        $validaciones = $this->validate($request,[
            'semestre' => 'required|string|max:10',
            'grupo'    => 'required|string|max:10',
            'turno'    => 'required|string|max:10',
        ]);

        $grupo = new Grupo;
        $grupo->semestre = $request->semestre;
        $grupo->grupo    = $request->grupo;
        $grupo->turno    = $request->turno;
        $grupo->save();

        return redirect()->route('agregar.grupo')->with([
            'message' => 'Un nuevo grupo se registro correctamente'
        ]);
    }

    public function actualizarGrupo(Request $request)
    {
        $validaciones = $this->validate($request,[
            'semestre' => 'required|string|max:10',
            'grupo'    => 'required|string|max:10',
            'turno'    => 'required|string|max:10',
        ]);

        $grupo = Grupo::find($request->id);
        $grupo->semestre = $request->semestre;
        $grupo->grupo    = $request->grupo;
        $grupo->turno    = $request->turno;
        $grupo->update();

        return redirect()->route('listar.grupos')->with([
            'message' => 'Un estudiante se actualizo correctamente'
        ]);
    }

    public function eliminarGrupo($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('listar.grupos')->with([
            'message' => 'Un nuevo estudiante se registro correctamente'
        ]);
    }

    public function verGrupoEstudiantes($id)
    {
        $grupo = Grupo::find($id);
        return view('grupo.grupo-estudiantes',['grupo' => $grupo]);
    }
}

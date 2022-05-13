<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EstudianteController extends Controller
{
    public function listarEstudiantes()
    {
        $estudiantes = Estudiante::select('nombre','apellidos', 'fecha_nacimiento', 'email', 'telefono')->get();
        return view('estudiante.listar-estudiantes', ['estudiantes' => $estudiantes]);
    }

    public function formularioInsertarEstudiante()
    {
        return view('estudiante.crear-estudiante');
    }

    public function formularioEditarEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiante.editar-estudiante',['estudiante' => $estudiante]);
    }

    public function insertarEstudiante(Request $request)
    {
        // Valido los campos respetando el tipo y tamao de dato
        $validaciones = $this->validate($request,[
            'nombre'    => 'required|string|max:20',
            'apellidos' => 'required|string|max:30',
            'email'     => 'required|email',
            'edad'      => 'required|nullable|date',
            'telefono'  => 'required|string|max:11',
        ]);

        // Instanciamos el objeto Estudiante
        $estudiante = new Estudiante;
        $estudiante->nombre    = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email     = $request->email;
        $estudiante->fecha_nacimiento      = $request->edad;
        $estudiante->telefono  = $request->telefono;
        $estudiante->save();

        return redirect()->route('agregar.estudiante')->with([
            'message' => 'Un nuevo estudiante se registro correctamente'
        ]);

    }

    public function actualizarEstudiante(Request $request)
    {
        $validaciones = $this->validate($request,[
            'nombre'    => 'required|string|max:20',
            'apellidos' => 'required|string|max:30',
            'email'     => 'required|email',
            'edad'      => 'required|nullable|date',
            'telefono'  => 'required|string|max:11',
            'id'         => 'required|integer',
        ]);

        $estudiante = Estudiante::find($request->id);
        $estudiante->nombre    = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email     = $request->email;
        $estudiante->fecha_nacimiento      = $request->edad;
        $estudiante->telefono  = $request->telefono;
        $estudiante->update();

        return redirect()->route('listar.estudiantes')->with([
            'message' => 'Un estudiante se actualizo correctamente'
        ]);

    }

    public function eliminarEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        return redirect()->route('listar.estudiantes')->with([
            'message' => 'Un nuevo estudiante se registro correctamente'
        ]);
    }

    public function verGruposEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiante.grupos-estudiante',['estudiante' => $estudiante]);
    }
}

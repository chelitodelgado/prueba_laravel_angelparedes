<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = ['nombre', 'apellidos', 'fecha_nacimiento', 'email', 'telefono'];

    public function grupos()
    {
        return $this->belongsToMany('App\Grupo', 'estudiante_grupos', 'id_estudiante', 'id_grupo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudiantesGrupos extends Model
{
    protected $table = 'estudiantes_grupos';
    protected $fillable = [
        'id_estudiante',
        'id_grupo'
    ];
}

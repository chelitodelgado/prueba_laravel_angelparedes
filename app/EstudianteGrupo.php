<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudianteGrupo extends Model
{
    protected $table = 'estudiante_grupos';
    protected $fillable = ['id_estudiante','id_grupo'];

}

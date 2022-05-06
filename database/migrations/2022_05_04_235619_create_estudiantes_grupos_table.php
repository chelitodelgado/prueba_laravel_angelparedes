<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes_grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_grupo');
            $table->timestamps();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');
            $table->foreign('id_grupo')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes_grupos');
    }
}

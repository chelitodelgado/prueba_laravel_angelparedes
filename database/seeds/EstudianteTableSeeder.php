<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes')->insert([
            'nombre'           => 'Angel',
            'apellidos'        => 'Paredes Torres',
            'fecha_nacimiento' => now(),
            'email'            => 'angel@gmail.com',
            'telefono'         => '1234567890'
        ]);
    }
}

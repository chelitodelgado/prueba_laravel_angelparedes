<?php

use Illuminate\Support\Str;
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
            'nombre'    => Str::random(10),
            'apellidos' => Str::random(6),
            'edad'      => 26,
            'email'     => Str::random(10) . '@gmail.com',
            'telefono'  => 1234567890,
        ]);
    }
}

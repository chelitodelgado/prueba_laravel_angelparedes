<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstudianteTableSeeder::class);
        $this->call(GrupoTableSeeder::class);
    }
}

// php artisan db:seed --force

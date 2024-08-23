<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Rol')->insert(
            [
                ['nombre' => 'Estudiante'],
                ['nombre' => 'Profesor'],
                ['nombre' => 'Administrador']
            ]
        );
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoPrestamoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Estado_Prestamo')->insert(
            [
                ['estado' => 'Pendiente'],
                ['estado' => 'Aprobado'],
                ['estado' => 'Cancelado'],
                ['estado' => 'Prestado'],
                ['estado' => 'Devuelto'],
                ['estado' => 'Atrasado']
            ]
        );
    }
}
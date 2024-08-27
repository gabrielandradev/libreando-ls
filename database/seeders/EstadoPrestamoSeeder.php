<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\EstadoPrestamo;

class EstadoPrestamoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (EstadoPrestamo::getAll() as $id => $estado) {
            DB::table('Estado_Prestamo')->insert(
                ['id' => $id, 'estado' => $estado]
            );
        }
    }
}
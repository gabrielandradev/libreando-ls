<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\DisponibilidadLibro;

class DisponibilidadLibroSeeder extends Seeder
{
    public function run(): void
    {
        foreach (DisponibilidadLibro::getAll() as $id => $estado) {
            DB::table('Disponibilidad_Libro')->insert(
                ['id' => $id, 'estado' => $estado]
            );
        }
    }
}

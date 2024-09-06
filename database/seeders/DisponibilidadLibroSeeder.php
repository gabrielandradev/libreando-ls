<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisponibilidadLibro;

class DisponibilidadLibroSeeder extends Seeder
{
    const DISPONIBILIDAD_LIBRO = [
        "disponible",
        "prestado",
        "bloqueado",
        "suspendido"
    ];

    public function run(): void
    {
        foreach (self::DISPONIBILIDAD_LIBRO as $id => $estado) {
            // DDB::table('Disponibilidad_Libro')->insert(
            //     ['id' => $id, 'estado' => $disponibilidad]
            // );
            DisponibilidadLibro::create([
                "id" => $id,
                "estado" => $estado
            ]);
        }
    }
}

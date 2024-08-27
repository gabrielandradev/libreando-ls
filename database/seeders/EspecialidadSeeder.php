<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\Especialidad;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Especialidad::getAll() as $id => $nombre) {
            DB::table('Especialidad')->insert(
                ['id' => $id, 'nombre' => $nombre]
            );
        }
    }
}

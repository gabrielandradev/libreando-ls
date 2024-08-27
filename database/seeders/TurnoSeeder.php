<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\Turno;

class TurnoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Turno::getAll() as $id => $nombre) {
            DB::table('Turno')->insert(
                ['id' => $id, 'nombre' => $nombre]
            );
        }
    }
}
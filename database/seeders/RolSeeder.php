<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\Rol;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Rol::getAll() as $id => $nombre) {
            DB::table('Rol')->insert(
                ['id' => $id, 'nombre' => $nombre]
            );
        }
    }
}
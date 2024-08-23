<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCuentaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Estado_Cuenta')->insert(
            [
                ['estado' => 'Pendiente'],
                ['estado' => 'Activa'],
                ['estado' => 'Bloqueada']
            ]
        );
    }
}

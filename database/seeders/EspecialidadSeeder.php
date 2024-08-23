<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Especialidad')->insert(
            [
                ['nombre' => 'Computación'],
                ['nombre' => 'Química'],
                ['nombre' => 'Electrónica'],
                ['nombre' => 'Eléctrica'],
                ['nombre' => 'Construcciones'],
                ['nombre' => 'Mecánica']
            ]
        );
    }
}

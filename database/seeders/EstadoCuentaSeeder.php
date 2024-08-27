<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\EstadoCuenta;

class EstadoCuentaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (EstadoCuenta::getAll() as $id => $estado) {
            DB::table('Estado_Cuenta')->insert(
                ['id' => $id, 'estado' => $estado]
            );
        }
    }
}

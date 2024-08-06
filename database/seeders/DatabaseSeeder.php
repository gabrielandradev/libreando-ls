<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Rellenar la base de datos de la aplicacion
     */
    public function run(): void
    {
        $usuarios = Student::factory()->count(10)->make();

        DB::table('usuarios')->insert($usuarios->toArray());
    }
}

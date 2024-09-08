<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Major::MAJORS as $major) {
            Major::create(['nombre' => $major]);
        }
    }
}

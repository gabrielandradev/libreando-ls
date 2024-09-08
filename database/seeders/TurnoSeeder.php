<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;

class TurnoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Shift::SHIFTS as $shift) {
            Shift::create(['nombre' => $shift]);
        }
    }
}
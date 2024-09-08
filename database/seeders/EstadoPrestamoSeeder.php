<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoanStatus;

class EstadoPrestamoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (LoanStatus::STATUSES as $status) {
            LoanStatus::create(['estado' => $status]);
        }
    }
}
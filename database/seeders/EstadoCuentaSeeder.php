<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountStatus;

class EstadoCuentaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (AccountStatus::STATUSES as $status) {
            AccountStatus::create(['estado' => $status]);
        }
    }
}

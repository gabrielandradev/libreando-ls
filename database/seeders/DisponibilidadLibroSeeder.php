<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookAvailability;

class DisponibilidadLibroSeeder extends Seeder
{

    public function run(): void
    {
        foreach (BookAvailability::STATUSES as $status) {
            BookAvailability::create(["estado" => $status]);
        }
    }
}

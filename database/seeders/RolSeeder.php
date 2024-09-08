<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Role::ROLES as $role) {
            Role::create(['nombre' => $role]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'role' => 'super admin'
        ]);

        Role::create([
            'id' => 10,
            'role' => 'admin'
        ]);
    }
}

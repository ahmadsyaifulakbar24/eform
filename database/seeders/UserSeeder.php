<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '7bdeba5c-fc1f-4e36-9e66-f14e0519e16b',
            'name' => 'Admin',
            'email' => 'bti@kemenkopukm.go.id',
            'password' => Hash::make('supporteform2022'),
            'role' => 'admin'
        ]);
    }
}

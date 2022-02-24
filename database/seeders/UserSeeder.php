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
            'name' => 'Super Admin',
            'email' => 'katalogumkm@kemenkopukm.go.id',
            'password' => Hash::make('katalogumkm2022'),
            'role' => 'super admin'
        ]);
        User::create([
            'id' => '276fa62a-43de-4f38-a9c1-268472a6836f',
            'name' => 'Admin',
            'email' => 'adminkatalog@kemenkopukm.go.id',
            'password' => Hash::make('adminkatalog2022'),
            'role' => 'admin'
        ]);
    }
}

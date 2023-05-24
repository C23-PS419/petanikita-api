<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@petanikita.com',
            'phone' => '08383838383',
            'password' => Hash::make('admin123'),
        ]);
        User::factory()->create([
            'name' => 'Risang Baskoro',
            'email' => 'risangbaskoro@icloud.com',
            'phone' => '08383838381',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'name' => 'Irsyad Abqori',
            'email' => 'aleirsyad46@gmail.com',
            'phone' => '08383838382',
            'password' => Hash::make('password'),
        ]);
    }
}

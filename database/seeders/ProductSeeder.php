<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $user->products()->saveMany(
                Product::factory()->count(rand(0, 5))->make()
            );
        });
    }
}

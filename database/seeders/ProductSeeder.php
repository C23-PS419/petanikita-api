<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        User::find(2)->each(function (User $user) {
            Product::factory()->create([
                'user_id' => $user,
            ]);
        });

        User::all()->each(function (User $user) {
            Product::factory(rand(1, 3))
                ->create([
                    'user_id' => $user,
                ]);
        });
    }
}

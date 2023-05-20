<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        User::find(2)->products()->save(
            Product::factory()->make()
        );

        User::all()->each(function (User $user) {
            $user->products()->saveMany(
                Product::factory()->count(rand(0, 5))->make()
            );
        });
    }
}

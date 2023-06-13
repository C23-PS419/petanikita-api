<?php

namespace Database\Factories;

use App\Models\Product;
use Database\Factories\Concerns\DownloadImagesToMediaLibrary;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    use DownloadImagesToMediaLibrary;

    protected $model = Product::class;

    public function configure(): static
    {
        return $this->afterCreating($this->assignImagesToMediaLibrary(256, 256, 'images', 'plants', 1, 1));
    }

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(rand(1, 3), true),
            'description' => $this->faker->paragraphs(rand(1, 3), true),

            'price' => rand(1, 10) * 1000,
            'stock' => rand(1, 10),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

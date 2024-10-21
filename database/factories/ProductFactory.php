<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'desc' => $this->faker->text(120), 
            'price' => $this->faker->numberBetween(10000, 100000),
            'image' => '' 
        ];
    }
}

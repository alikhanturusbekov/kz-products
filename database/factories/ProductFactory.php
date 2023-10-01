<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'category' => 'Одежда',
            'contact_link' => fake()->url(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(5),
            'price' => fake()->numberBetween(1000, 20000),
            'photo' => fake()->imageUrl(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'savory, sweet, yummy',
            'owner' => $this->faker->name(),
            'email' => $this->faker->email(),
            'duration' => $this->faker->randomDigit(),
            'description' => $this->faker->paragraph(5)
        ];
    }
}

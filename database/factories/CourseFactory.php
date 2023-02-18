<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 0, 100),
            'image' => fake()->image_url(),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}

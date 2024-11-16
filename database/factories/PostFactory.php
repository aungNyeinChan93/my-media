<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'description' => fake()->realText(),
            'image' => asset('/postsImage/default.png'),
            "user_id" => User::inRandomOrder()->first()->id ?? User::factory(),
            "category_id" => Category::inRandomOrder()->firstOrFail()->id ?? Category::factory()
        ];
    }
}

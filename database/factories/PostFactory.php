<?php

namespace Database\Factories;

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
            'title' => fake()->title(),
            'slug' => fake()->unique()->slug(),
            'body' => fake()->paragraph(),
            'image_path' => fake()->imageUrl(),
            'source_url' => fake()->url(),
            'source_title' => fake()->domainName(),
        ];
    }
}

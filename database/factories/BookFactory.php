<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'isbn' =>fake()->unique()->numerify('000#######'),
            'author_id' => Author::inRandomOrder()->first()->id,
            'category_id' =>Category::inRandomOrder()->first()->id,
            'stock' => fake()->numberBetween(1, 20),
            'description' => fake()->paragraph(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'  => 1,
            'slug'     => $this->faker->slug(),
            'title'    => $this->faker->text(100),
            'brief'    => $this->faker->text(120),
            'content'  => $this->faker->text(500),
            'minute'   => $this->faker->randomFloat(0, 1, 60),
            'tags'     => $this->faker->word(),
            'image'    => $this->faker->imageUrl()
        ];
    }
}

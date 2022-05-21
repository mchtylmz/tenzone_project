<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug'     => $this->faker->slug(),
            'title'    => $this->faker->text(100),
            'content'  => $this->faker->text(500),
            'price'    => $this->faker->randomFloat(2, 0, 500),
            'tags'     => $this->faker->word(),
            'category' => $this->faker->word(),
            'image'    => $this->faker->imageUrl()
        ];
    }
}

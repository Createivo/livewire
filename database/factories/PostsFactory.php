<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'title' => $this->faker->name(),
                'body' => $this->faker->text(),
                'img'=> $this->faker->imageUrl(200, 200, 'animals', true)
            ];
    }
}

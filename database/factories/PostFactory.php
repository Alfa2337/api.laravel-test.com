<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1, 10000),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}

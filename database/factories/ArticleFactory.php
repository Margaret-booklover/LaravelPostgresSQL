<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'Title' => $this->faker->realText(10),
            'Code' =>Str::slug($this->faker->bothify($string='### ?## ??# ???')),
            'Contents' => $this->faker->realText(100),
            'Author' => $this->faker->name()
        ];
    }
}

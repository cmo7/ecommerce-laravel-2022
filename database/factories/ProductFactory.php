<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(10);
        $slug = Str::slug($name . time());
        return [
            "name" => $name,
            "slug" => $slug,
            "short_description" => $this->faker->text(random_int(10, 255)),
            "content" => $this->faker->paragraphs(4, true),
            "picture" => $this->faker->imageUrl(),
            "price" => $this->faker->randomFloat(2, 1, 500),
            "stock" => $this->faker->randomNumber(3),
            "category_id" => 1,
        ];
    }
}

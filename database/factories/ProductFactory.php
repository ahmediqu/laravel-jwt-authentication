<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->colorName,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100, 1000),
            'image' => $this->faker->image('public/storage/images',640,480, null, false),
        ];
    }
}

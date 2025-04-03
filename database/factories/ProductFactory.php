<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

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
    public function definition(): array
    {
        return [
            'name'=>'pizza',
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->numberBetween(5,10),
            'quantity'=> $this->faker->numberBetween(5,10),
            'imagepath'=> 'products/32ln6YBtKwaVaswE6YEbms78877Y8dQ1xGSmPRVk.jpg',
            'category_id'=> 4
        ];
    }
}

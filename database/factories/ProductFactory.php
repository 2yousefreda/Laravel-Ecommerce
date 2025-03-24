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
            'name'=>'Berry',
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->numberBetween(5,10),
            'quantity'=> $this->faker->numberBetween(5,10),
            'imagepath'=> 'products\4dhOm4o1CMl5JoSNlH0E9BtTjkN5kJhpzeXucvwe.jpg',
            'category_id'=> 2
        ];
    }
}

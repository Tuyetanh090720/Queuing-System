<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customerId' => $this->faker->numberBetween($min = 1, $max = 5),
            'deviceId' => $this->faker->numberBetween($min = 1, $max = 5),
            'numberTime' => $this->faker->date(),
            'numberExpiry' => $this->faker->date(),
            'numberST' => $this->faker->sentence(3, true),
            'numberSupply' => $this->faker->sentence(3, true),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

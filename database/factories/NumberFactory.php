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
            'numberSerial' => $this->faker->numberBetween($min = 1, $max = 3),
            'customerId' => $this->faker->numberBetween($min = 1, $max = 3),
            'serviceId' => $this->faker->numberBetween($min = 1, $max = 3),
            'created_at' => $this->faker->date(),
            'numberExpiry' => $this->faker->date(),
            'numberST' => $this->faker->sentence(3, true),
            'numberSupply' => $this->faker->sentence(3, true),
            'updated_at' => $this->faker->date(),
        ];
    }
}

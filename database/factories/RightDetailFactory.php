<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RightDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rightId' => $this->faker->numberBetween($min = 1, $max = 3),
            'rightFunctionId' => $this->faker->numberBetween($min = 1, $max = 3),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

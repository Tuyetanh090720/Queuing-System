<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rightName'  => $this->faker->name(),
            'rightDescription' => $this->faker->sentence(5, true),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

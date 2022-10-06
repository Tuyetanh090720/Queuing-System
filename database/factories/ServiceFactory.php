<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceName'  => $this->faker->name(),
            'serviceIP' => $this->faker->phoneNumber(),
            'serviceActiveST' => $this->faker->sentence(3, true),
            'serviceConnectST' => $this->faker->sentence(3, true),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

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
            'serviceCode' => $this->faker->word(),
            'serviceName'  => $this->faker->name(),
            'serviceDescription' => $this->faker->sentence(5, true),
            'serviceActiveST' => $this->faker->sentence(3, true),
            'serviceRuleNumber' => $this->faker->sentence(3, true),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

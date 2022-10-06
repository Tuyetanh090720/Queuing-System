<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deviceName'  => $this->faker->name(),
            'deviceDescription' => $this->faker->sentence(5, true),
            'deviceActiveST' => $this->faker->sentence(3, true),
            'serviceId' => $this->faker->numberBetween($min = 1, $max = 5),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

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
            'deviceAddressIp'  => $this->faker->phoneNumber(),
            'deviceActiveST' => $this->faker->sentence(3, true),
            'deviceConnectST' => $this->faker->sentence(3, true),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

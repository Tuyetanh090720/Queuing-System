<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accountName'  => $this->faker->name(),
            'accountLogin' => $this->faker->username(),
            'password' => bcrypt('matkhau'),
            'accountPhone' => $this->faker->phoneNumber(),
            'accountEmail' => $this->faker->email(),
            'accountActiveST' => $this->faker->sentence(3, true),
            'rightId' => $this->faker->numberBetween($min = 1, $max = 3),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}

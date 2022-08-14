<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(0,1),
            'email' => $this->faker->safeEmail,
            'postcode' => $this->faker->numberBetween(1111111,9999999),
            'address' => $this->faker->text(10),
            'building_name' => $this->faker->text(10),
            'opinion' => $this->faker->text(100),
        ];
    }
}

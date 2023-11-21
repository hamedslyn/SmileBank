<?php

namespace Smile\Bank\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smile\Bank\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'mobile'     => $this->faker->unique()->phoneNumber(),
            'email'      => $this->faker->unique()->safeEmail,
        ];
    }
}

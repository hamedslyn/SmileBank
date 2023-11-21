<?php

namespace Smile\Bank\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smile\Bank\Models\Account;
use Smile\Bank\Models\Customer;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'account_number' => $this->faker->unique()->iban(length: 8),
            'balance'        => $this->faker->randomDigit(),
            'status'         => $this->faker->randomElement([true, false]),
            'customer_id'    => Customer::factory(),
        ];
    }
}

<?php

namespace Smile\Bank\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smile\Bank\Models\Account;
use Smile\Bank\Models\Transfer;

class TransferFactory extends Factory
{
    protected $model = Transfer::class;

    public function definition()
    {
        $senderAccountId   = Account::factory();
        $receiverAccountId = Account::factory();

        return [
            'sender_account_id'   => $senderAccountId,
            'receiver_account_id' => $receiverAccountId,
            'amount'              => $this->faker->randomDigit(),
            'status'              => $this->faker->randomElement(['unverified', 'verified']),
            'description'         => $this->faker->sentence,
            'tracking_code'       => $this->faker->uuid(),
        ];
    }
}

<?php

namespace Smile\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use Smile\Bank\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::factory(15)->create();
    }
}

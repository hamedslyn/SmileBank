<?php

namespace Smile\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use Smile\Bank\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::factory(10)->create();
    }
}

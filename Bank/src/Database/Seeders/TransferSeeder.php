<?php

namespace Smile\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use Smile\Bank\Models\Transfer;

class TransferSeeder extends Seeder
{
    public function run()
    {
        Transfer::factory(50)->create();
    }
}

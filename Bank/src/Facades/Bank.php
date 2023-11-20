<?php

namespace Smile\Bank\Facades;

use Illuminate\Support\Facades\Facade;

class Bank extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bank';
    }
}

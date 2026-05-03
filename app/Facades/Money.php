<?php

namespace App\Facades;

use App\Services\MoneyService;
use Illuminate\Support\Facades\Facade;

class Money extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MoneyService::class;
    }
}

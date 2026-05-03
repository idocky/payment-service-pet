<?php

namespace App\Services;

use App\Models\Currency;

class MoneyService
{
    public function fromCents(int $cents, int|Currency $forDigits): float
    {
        $digits = $forDigits instanceof Currency ? $forDigits->digits : $forDigits;

        return round($cents / (10 ** $digits), $digits);
    }

    public function toCents(float $amount, int|Currency $forDigits): int
    {
        $digits = $forDigits instanceof Currency ? $forDigits->digits : $forDigits;

        return round($amount * (10 ** $digits));
    }
}

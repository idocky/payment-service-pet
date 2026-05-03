<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    const DEFAULT_CURRENCY = 'USD';
    protected $fillable = [
        'name',
        'code',
        'digits'
    ];
}

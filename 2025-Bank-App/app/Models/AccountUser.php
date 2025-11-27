<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AccountUser extends Pivot
{
    protected $fillable = [
        'account_id',
        'user_id',
    ];
}


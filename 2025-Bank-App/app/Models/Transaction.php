<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'title',
        'amount',
        'old_balance',
        'new_balance'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

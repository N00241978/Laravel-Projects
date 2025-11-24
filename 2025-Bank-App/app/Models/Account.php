<?php

namespace App\Models;

use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['balance', 'date_opened', 'account_status'];

    // account can have many users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

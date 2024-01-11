<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'plan',
        'amount',
        'type',
        'wallet_address',
        'confirmation_1',
        'confirmation_2',
        'created_at',
        'updated_at',
        'payment_status',
        'deleted_at'
    ];

    public function userdetails()
    {
        return  $this->hasOne(User::class, 'id', 'user_id');
    }
}

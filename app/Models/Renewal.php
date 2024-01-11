<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Renewal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'transaction_id',
        'plan',
        'renewal_amount',
        'date_created',
        'date_updated',
    ];
    
    public function userdetails()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
    
}

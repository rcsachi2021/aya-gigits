<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfit extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'user_id',
        'plan',
        'profit',
        'profit_date',
    ];
}

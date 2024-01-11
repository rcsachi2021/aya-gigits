<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAffiliate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'user_id',
    ];
}

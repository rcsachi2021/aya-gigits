<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'from_user',
        'to_user',
        'title',
        'type',
        'message',
        'date_created',
        'date_viewed',
        'viewed_status',
        'status',
    ];
}

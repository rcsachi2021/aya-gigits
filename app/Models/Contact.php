<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'phone_or_email',
        'subject',
        'message',
        'created_at',
        'status'
    ];
}

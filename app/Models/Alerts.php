<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    protected $fillable = [
        'subject',
        'message',
        'categary',
        'status',
        'created_at',
    ];
}

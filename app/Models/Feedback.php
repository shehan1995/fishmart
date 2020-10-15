<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $fillable = [
        'name',
        'number',
        'description',
        'status',
        'created_at',
    ];
}

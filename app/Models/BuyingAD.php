<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyingAD extends Model
{
    protected $fillable = [
        'users_id',
        'fish_id',
        'amount',
        'price',
        'status'
    ];
    public function user() {
        return $this->belongsTo('App\Models\Users');
    }
    public function fish() {
        return $this->belongsTo('App\Models\Fish');
    }
}

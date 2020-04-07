<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'selling_id',
        'buying_id',
        'amount',
        'status'
    ];
    public function seller() {
        return $this->belongsTo('App\Models\SellingAD');
    }
    public function buyer() {
        return $this->belongsTo('App\Models\BuyingAD');
    }
}

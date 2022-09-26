<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription;

class Plan extends Model
{
    protected $fillable = ['plan_id','name','price','billing_method','currency','interval_count'];
    use HasFactory;

    function get_price(){
        return $this->belongsTo(Subscription::class,'price');
    }
}

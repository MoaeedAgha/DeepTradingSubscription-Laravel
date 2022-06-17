<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Orders';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'OrderDate', 'UserId', 'ProductId', 'Stocks', 'TotalPrice', 'ExpiryDate', 'Status'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'ProductId');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
}

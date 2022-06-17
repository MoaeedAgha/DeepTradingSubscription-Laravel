<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'CreateDate', 'Name', 'Description', 'Price', 'NumberOfStocks', 'Frequency'
    ];

    public function order(){
        return $this->hasMany('App\Order', 'ProductId'); 
    }
}

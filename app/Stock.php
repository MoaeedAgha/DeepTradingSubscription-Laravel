<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'Stock';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'CreateDate', 'Ticker', 'Date', 'Volume', 'High', 'Low'
    ];
}

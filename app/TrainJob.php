<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainJob extends Model
{
    protected $table = 'TrainJob';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'CreateDate', 'UserId', 'OrderId', 'Ticker', 'Status', 'PercentComplete', 'JSONFile'
    ];
}

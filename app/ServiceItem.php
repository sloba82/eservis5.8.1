<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{

    protected $table = 'service_items';

    protected $fillable = [
        'service_id',
        'desc',
        'pieces',
        'piece_price',
        'pdv',
        'total'
    ];


}

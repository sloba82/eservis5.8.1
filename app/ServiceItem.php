<?php

namespace App\ServiceItem;


use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    //
    protected $table = 'service_items';

    protected $fillable = [
        'car_id',
        'user_id',
        'service_name',
        'service_man',
        'service_status',
        'kilometer',
        'service_date',
        'description',
    ];


}

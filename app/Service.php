<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

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

    public function serviceCar()
    {
        return $this->belongsTo('App\Car');
    }


    public function serviceItems() {
        return $this->hasMany('App\ServiceItem');
    }

}

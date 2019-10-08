<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarUser extends Model
{
    protected $table = 'car_users';

    protected $fillable = [
        'car_id',
        'user_id'
    ];

    public function usersAndCars() {
        return $this->belongsToMany('App\Car')->withPivot('car_id', 'user_id');

    }

}

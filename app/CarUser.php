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


}

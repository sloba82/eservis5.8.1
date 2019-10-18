<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CarUser extends Pivot
{
    protected $table = 'car_user';

    protected $fillable = [
        'car_id',
        'user_id'
    ];



}

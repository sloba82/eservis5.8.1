<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardReader extends Model
{
    //
    protected $table = 'card_datas';

    protected $fillable = ['car_id', 'card_data'];
}

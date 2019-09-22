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

    /**
     * Rules to be passed while creating new Service item.
     *
     * @var array
     */
    public static $rules = [
        'desc'        => 'required|max:256',
        'pieces'      =>'required',
        'piece_price' =>'required',
    ];


}

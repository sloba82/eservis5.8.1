<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoitment extends Model
{
    //
    protected $table = "appoitments";

    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'email',
        'phone',
        'veh_make',
        'appoitment',
        'description',
        'comment_admin',
        'active',
        'confirm'
    ];

    public static $rules = [
        'name' => 'required|max:256',
        'last_name' => 'required|max:256',
        'phone' => 'required|integer',
    ];



}

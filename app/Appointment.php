<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = "appoitments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * Rules to be passed while creating new appointment.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:256',
        'last_name' => 'required|max:256',
        'phone' => 'required|integer',
        'description' => 'required|max:1024',
    ];



}

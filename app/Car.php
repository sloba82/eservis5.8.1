<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numberplate',
        'id',
        'make',
        'model',
        'engine',
        'year',
        'created_at',
        'updated_at',
    ];

    /**
     * Rules to be passed while creating a car.
     *
     * @var array
     */
    public static $rules = [
        'numberplate' =>'required|max:16',
    ];

   /* public function cars()
    {
        return $this->hasMany('App\Car');
    }*/

    /**
     * Check if car witht plate number has a owner.
     *
     * @var string
     */
    public function plateHasUser($param)
    {
        $numberplate = $param;
        $plates = DB::table('cars')
            ->select('id')
            ->where('numberplate', $numberplate)
            ->limit(1)
            ->get();

        $plateID = '';
        foreach ($plates as $plate) {
            $plateID = $plate->id;
        }
        if ($plateID) {
            return $plateID;
        } else {
            return 0;
        }
    }

    public  function users() {
        return $this->belongsToMany('App\User' , 'car_user');
    }





}

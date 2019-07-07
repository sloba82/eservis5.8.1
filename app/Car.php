<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'numberplate',
        'id',
        'numberplate',
        'make',
        'model',
        'engine',
        'year',
        'created_at',
        'updated_at',
    ];

    public function cars()
    {
        return $this->hasMany('App\Car');
    }

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

}

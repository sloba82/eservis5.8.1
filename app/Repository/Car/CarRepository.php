<?php

namespace App\Repository\Car;

use App\Car;
use App\CarUser;
use App\Repository\AppCache\AppCacheRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;

class CarRepository implements CRUDInterface
{


    private static $data;

    public function __get($field)
    {
        return array_key_exists($field, $this->data) ? $this->data[$field] : null;
    }


    public static function save($params)
    {

        $params['numberplate'] = str_replace(['-', ' ', '*', '  '], '', $params['numberplate']);
        $id = DB::table('cars')->insertGetId([
            'numberplate' => $params['numberplate'],
            'make' => $params['make'],
            'model' => $params['model'],
            'engine' => $params['engine'],
            'year' => $params['year'],
            'mileage' => $params['mileage'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        AppCacheRepository::delateCreateCache('car', self::getAll());

        self::$data['id'] = $id;
        return $id;
    }

    public static function checkPlateNumber($numberplate)
    {
        $numberplate = str_replace(['-', ' ', '*', '  '], '', $numberplate);
        if (Car::where('numberplate', $numberplate)->first()) {
            return Car::where('numberplate', $numberplate)->first()->id;
        } else {
            return 0;
        }
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

    public static function getAll()
    {
        return Car::all();
    }

    public static function getById($id)
    {
        $car = Car::find($id);
        return $car->toArray();

    }

    public static function update($params, $id)
    {
        $Car = Car::findOrFail($id);
        $Car->update($params);
    }

    public static function delete($id)
    {
        $Car = Car::find($id);
        $Car->delete();
    }


}

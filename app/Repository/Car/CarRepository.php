<?php

namespace App\Repository\Car;

use App\Car;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;

class CarRepository implements CRUDInterface
{


    private $data;

    public function __get($field)
    {
        return array_key_exists($field, $this->data) ? $this->data[$field] : null;
    }

    public function save($params)
    {

        $params['numberplate'] = str_replace(['-', ' ', '*', '  '], '', $params['numberplate']);
        $id = DB::table('cars')->insertGetId([
            'numberplate' => $params['numberplate'],
            'make' => $params['make'],
            'model' => $params['model'],
            'engine' => $params['engine'],
            'year' => $params['year'],
            'mileage' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->data['id'] = $id;
        return $id;
    }

    public function checkPlateNumber($numberplate)
    {
        $numberplate = str_replace(['-', ' ', '*', '  '], '', $numberplate);
        if (Car::where('numberplate', $numberplate)->first()) {
            return 1;
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

    public function getAll()
    {
        return Car::all();
    }

        public function getById($id)
    {
        $car = Car::find($id);
        return $car->toArray();

    }

        public function update($params, $id)
    {
        $Car = Car::findOrFail($id);
        $Car->update($params);
    }

        public function delete($id)
    {
        $Car = Car::find($id);
        $Car->delete();
    }


}
<?php

namespace App\Repository\Services;

use App\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\Car\CarRepository;
use App\Repository\CRUDInterface;


class ServicesRepository implements CRUDInterface
{

    public static $id;

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return id of services save
     *
     *
     */

    public static function save($request)
    {
        $data = [
            'car_id' => $request['carID'],
            'user_id'=> $request['user_id'],
            'service_name' =>'',
            'service_man' => $request['service_man'],
            'service_status' => 'new',
            'kilometer' => $request['kilometer'],
            'service_date' => $request['service_date'],
            'description' => $request['description'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $id = DB::table('services')->insertGetId( $data );
        $data['service_name'] = Carbon::now()."/".$id;
        self::update($data, $id);

        return self::$id = $id;
    }

    public function carByID($id)
    {
        $car = DB::table('cars')
            ->where('id', $id)
            ->first();
        return $car;
    }


    public function carInServiceOrCreateNewCar($request)
    {
        $carPlate = new CarRepository();
        $carID = $carPlate->plateHasUser($request['numberplate']);
        if ($carID) {
            $car = $this->carByID($carID);
            $addCar = array(
                'carID' => $carID,
                'numberplate' => strtoupper($request['numberplate']),
                'make' => $car->make,
                'model' => $car->model,
                'engine' => $car->engine,
                'year' => $car->year,
                'mileage' => $car->mileage,

            );
            return view('/admin/admin_service-add', compact('addCar'));

        } else {
            // ovde ce morati da se kreira novi user ako ne postiji
            // sto znaci previ se novi auto complete za listanje usera

            $numberplate = str_replace(' ', '', $request['numberplate']);
            $newCar = array(
                'numberplate' => strtoupper($numberplate),
                'action'      => 'create_user',
            );
           // return view('/admin/admin_service-createCar', compact('newCar'));
            return view('admin.car.create', compact('newCar') );
        }
    }



    public static function getAll()
    {
        return Service::all();
    }

    public static function getById($id)
    {
        $service = Service::find($id);
        return $service->toArray();
    }

    public static function update($params, $id)
    {
        $Service = Service::findOrFail($id);
        $Service->update($params);
    }

    public static function delete($id)
    {
        $Service = Service::find($id);
        $Service->delete();
    }

}
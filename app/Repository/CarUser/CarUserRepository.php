<?php

namespace App\Repository\CarUser;

use App\CarUser;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;
use App\Repository\AppCache\AppCacheRepository;
class CarUserRepository implements CRUDInterface
{



    /**
     * @param $entity can be user or car
     * @param $id is id of car or user
     */
    public function userCarData($entity, $id)
    {
        $userCarData = 0;
        if ($entity == 'car') {
            if (DB::table('car_users')->where('car_id', $id)->exists()) {
                $userCarData = DB::table('users')
                    ->select('users.name', 'users.last_name', 'users.address', 'users.city', 'users.phone', 'cars.*')
                    ->leftJoin('car_users', 'car_users.user_id', '=', 'users.id')
                    ->leftJoin('cars', 'cars.id', '=', 'car_users.car_id')
                    ->where('car_users.car_id', $id)
                    ->select('users.name', 'users.last_name', 'users.address', 'users.city', 'users.phone', 'cars.*')
                    ->limit(1)
                    ->get();
                $userCarData = $userCarData[0];

            }
        } elseif ($entity == 'user') {
            if (DB::table('car_users')->where('user_id', $id)->exists()) {
                $userCarData = DB::table('users')
                    ->leftJoin('car_users', 'car_users.user_id', '=', 'users.id')
                    ->leftJoin('cars', 'cars.id', '=', 'car_users.car_id')
                    ->where('users.id', $id)
                    ->select('cars.*')
                    ->get();
            }
        } else {
            $userCarData = 0;
        }

        return  $userCarData;
    }

    public function save($params)
    {
        $Appopitment = new CarUser([
            'car_id' => $params['car_id'],
            'user_id' => $params['user_id']
        ]);
        $Appopitment->save();
    }

    public function getAll()
    {
        return CarUser::all();
    }

    public function getById($id)
    {
        return CarUser::find($id);
    }

    public function update($params, $id)
    {
        $CarUser = CarUser::findOrFail($id);
        $CarUser->update($params);
    }

    public function delete($id)
    {
        $CarUser = CarUser::find($id);
        $CarUser->delete();
    }


}




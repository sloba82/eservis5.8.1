<?php

namespace App\Repository\Appointment;

use App\Appoitment;
use App\Repository\CRUDInterface;
use App\Repository\AppCache\AppCacheRepository;


class AppointmentRepository implements CRUDInterface
{

    /**
     * @param $params
     */
    public static function save($params) {

        $Appopitment = new Appoitment([
            'user_id' => $params['user_id'],
            'name' => $params['name'],
            'last_name' => $params['last_name'],
            'email' => $params['email'],
            'phone' => $params['phone'],
            'veh_make' => $params['veh_make'],
            'appoitment' => $params['appoitment'],
            'description' => $params['description'],
            'comment_admin' => 'Nema komentar',
            'active' => 1,
            'confirm' => 0
        ]);
        $Appopitment->save();

        /**  After save delete previous cache and create new **/
        self::delateCreateCache();

    }

   public static function getAll(){
        return Appoitment::all();
    }

   public static function getById($id){
        return Appoitment::find($id);
    }

   public static function update($params, $id){
        $Appoitment = Appoitment::findOrFail($id);
        $Appoitment->update($params);
        /** After update delete previous cache and create new **/
        self::delateCreateCache();
    }

   public static function delete($id){
        $Appoitment = Appoitment::find($id);
        $Appoitment->delete();

        /** After delete, delete previous cache and create new **/
        self::delateCreateCache();

    }

   private static function delateCreateCache(){
        if (AppCacheRepository::checkCache('allAppointments')) {
            AppCacheRepository::deleteCache('allAppointments');
        }
        AppCacheRepository::storeCache(
            [
                'key' => 'allAppointments',
                'value' => self::getAll(),
            ]
        );
    }



}

<?php

namespace App\Repository\Appointment;

use App\Appointment;
use App\Repository\CRUDInterface;
use App\Repository\AppCache\AppCacheRepository;


class AppointmentRepository implements CRUDInterface
{

    /**
     * @param $params
     */
    public static function save($params) {

        $Appointment = new Appointment([
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
        $Appointment->save();

        /**  After save delete previous cache and create new **/
        AppCacheRepository::delateCreateCache('allAppointments', self::getAll() );

    }

   public static function getAll(){
        return Appointment::all();
    }

   public static function getById($id){
        return Appointment::find($id);
    }

   public static function update($params, $id){
        $Appoitment = Appointment::findOrFail($id);
        $Appoitment->update($params);
        /** After update delete previous cache and create new **/
        self::delateCreateCache();
    }

   public static function delete($id){
        $Appoitment = Appointment::find($id);
        $Appoitment->delete();

        /** After delete, delete previous cache and create new **/
        self::delateCreateCache();

    }





}

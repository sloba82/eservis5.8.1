<?php

namespace App\Repository\Appointment;

use App\Appoitment;
use App\Repository\CRUDInterface;



class AppointmentRepository implements CRUDInterface
{

    public function save($params) {

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
    }

    public function getAll(){
        return Appoitment::all();
    }

    public function getById($id){
        return Appoitment::find($id);
    }

    public function update($params, $id){
        $Appopitment = Appoitment::findOrFail($id);
        $Appopitment->update($params);
    }

    public function delete($id){
        $Appopitment = Appoitment::find($id);
        $Appopitment->delete();

    }



}
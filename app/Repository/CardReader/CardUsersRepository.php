<?php

namespace App\Repository\CardReader;

use App\Http\Controllers\Auth\RegisterController;

class CardUsersRepository  extends RegisterController {

    /**
     * requerd params
     *  'name' => $data['name'],
     *  'email' => $data['email'],
     *  'role'  => 2,
     *  'password' => bcrypt($data['password']),
     */
    public function createCardUser ($data) {
        $this->create($data);
    }

}




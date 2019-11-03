<?php

namespace App\Http\Controllers;

use App\Repository\CardReader\CardUsersRepository;
use App\User;
use App\CardReader;
use Illuminate\Http\Request;
use App\Repository\CardReader\CardReaderRepository;
use  App\Repository\Services\ServicesRepository;
use App\Repository\Car\CarRepository;

class CardReaderController extends Controller
{
    /**
     * Gets data from card reader
     *  parses data and return results to view
     */
    public function getCardReader($data)
    {
        $cardReader = new CardReaderRepository($data);
        $newData = $cardReader->getData();

        $userRole = User::where('email', $newData['email'])->first();
        if ($userRole->role == 1 && $newData['key'] == 'test') {

            /** should be set somewere else **/
            $cardReader->saveRawCardReaderData();
            return view('/card/card_reader', compact('newData'));
        } else {
            return 'email is not valid or not in database';
        }

    }

    public function sendCarToService(Request $request)
    {
        $request = $request->all();
        $carID = CarRepository::checkPlateNumber($request['numberplate']);

        if (!$carID) {
            $request['mileage'] = '';
            $carID = CarRepository::save($request);
        }

        $addCar = array(
            'id' => $carID,
            'numberplate' => strtoupper($request['numberplate']),
            'make' => $request['make'],
            'model' => $request['model'],
            'engine' => $request['engine'],
            'year' => $request['year'],
            'mileage' => '',
        );
        return view('/admin/admin_service-add', compact('addCar'));
    }


}

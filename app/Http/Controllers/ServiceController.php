<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserRole;
use App\Repository\Car\CarRepository;
use App\Repository\CarUser\CarUserRepository;
use App\Repository\Services\ServicesRepository;
use App\Repository\Helper\HelperRepository;
use App\Repository\ServiceItem\ServiceItemRepository;

class ServiceController extends Controller
{


    public function index()
    {

    }

    public function autocompleteNumberPlates(Request $request)
    {
        $value = $request['AppData']['term'];
        $Cars = DB::table( 'cars' )
            ->where( 'numberplate', 'like', '%' . $value . '%' )
            ->limit( 10 )
            ->get();

        $numberPlate = array();
        foreach ($Cars as $Car) {
            array_push( $numberPlate, $Car->numberplate );
        }
        return response()->json( $numberPlate );
    }

    public function carInServiceOrCreateNewCar(Request $request)
    {
        $servicesRepository = new ServicesRepository();
        return $servicesRepository->carInServiceOrCreateNewCar( $request );
    }

    public function serviceCarAdd(Request $request,
                                  ServicesRepository $servicesRepository,
                                  HelperRepository $helperRepository)
    {
        $user = $request->user();
        $request = $request->all();
        $request{'user_id'} = $user->id;
        $request['service_man'] = $user->name . ' ' . $user->last_name;
        $carID = $request['carID'];
        $request['service_date'] = $helperRepository->timeFormat( $request['service_date'] );
        $serviceID = $servicesRepository->save( $request );

        if ($carID) {
            $role = UserRole::find( $user->role );

            if ($role->name == 'serviceman') {
                return redirect( '/service' );
            } elseif ($role->name == 'admin') {
                return redirect( '/service-editcar/carID/' . $carID . '/serviceID/' . $serviceID );
            } else {
                return redirect( 'home' );
            }
        }
    }

    public function serviceItemAdd(Request $request,
                                ServiceItemRepository $serviceItemRepository)
    {

        $request->all();
        /*$serviceItemRepository->save( $request );*/
    }

    public function serviceEditCar($carID,
                                   $serviceID,
                                   CarUserRepository $carUserRepository,
                                   ServicesRepository $servicesRepository,
                                   CarRepository $carRepository,
                                   ServiceItemRepository $serviceItemRepository)
    {

        $carData['serviceData'] = $servicesRepository->getById( $serviceID );
        $userCarData = $carUserRepository->userCarData( 'car', $carID );
        if ($userCarData) {
            $carData['carData'] = get_object_vars( $userCarData );
        } else {
            $carData['carData'] = $carRepository->getById( $carID );
        }

        /*Not finished service it is hard coded for testing  perpesis*/

        $carData['serviceItems'] = $serviceItemRepository->serviceItem($serviceID);
        $carData['totalSum'] = $carData['serviceItems']['totalSum'];
        unset( $carData['serviceItems']['totalSum'] );
        return view( '/admin/admin_service-edit', compact( 'carData' ) );
    }


}

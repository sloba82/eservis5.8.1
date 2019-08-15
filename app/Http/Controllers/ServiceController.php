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

    private $servicesRepo;
    private $carUserRepo;
    private $carRepo;
    private $serviceItemRepo;

    public function __construct()
    {
        $this->servicesRepo = new ServicesRepository();
        $this->carUserRepo = new CarUserRepository();
        $this->carRepo = new CarRepository();

        /* nemoze ovako sa pravi objekat sato sto  se nemo dobiti promene da save i delete */
        $this->serviceItemRepo = new ServiceItemRepository();
    }


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
        return $this->servicesRepo->carInServiceOrCreateNewCar( $request );
    }

    public function serviceCarAdd(Request $request,
                                  HelperRepository $helperRepository)
    {
        $user = $request->user();
        $request = $request->all();
        $request{'user_id'} = $user->id;
        $request['service_man'] = $user->name . ' ' . $user->last_name;
        $carID = $request['carID'];
        $request['service_date'] = $helperRepository->timeFormat( $request['service_date'] );
        $serviceID = $this->servicesRepo->save( $request );

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

    public function serviceEditCar($carID, $serviceID)
    {
        $carData['serviceData'] = $this->servicesRepo->getById( $serviceID );
        $userCarData = $this->carUserRepo->userCarData( 'car', $carID );
        if ($userCarData) {
            $carData['carData'] = get_object_vars( $userCarData );
        } else {
            $carData['carData'] = $this->carRepo->getById( $carID );
        }
        $carData['serviceItems'] = $this->serviceItemRepo->serviceItem( $serviceID );
        $carData['totalSum'] = $carData['serviceItems']['totalSum'];
        unset( $carData['serviceItems']['totalSum'] );

        return view( '/admin/admin_service-edit', compact( 'carData' ) );
    }

    public function ajaxServiceItem(Request $request){

        $data = json_decode($request->getContent(), true);
        if ($data['action'] == 'save' ){
            return $this->saveServiceItem($data);
        }

        if($data['action'] == 'delete'){
            return $this->deleteServiceItem($data);
        }
    }

    public function saveServiceItem($data)
    {
        $this->serviceItemRepo->save([
            'service_id' => $data['service_id'],
            'desc' => $data['desc'],
            'pieces' => $data['pieces'],
            'piece_price' => $data['piece_price'],
        ]);
        return $this->serviceItemTable($data);
    }

    public function deleteServiceItem($data)
    {
        $this->serviceItemRepo->delete($data['serviceItem_id']);
        return $this->serviceItemTable($data['service_id']);
    }

    private function serviceItemTable ($data){
        $carData['serviceItems'] =  $this->serviceItemRepo->serviceItem($data['service_id']);
        $carData['totalSum'] = $carData['serviceItems']['totalSum'];
        unset( $carData['serviceItems']['totalSum'] );

        $html = view('admin.serviceItem.table', compact('carData'))->render();
        return response()->json(compact('html'));
    }














}

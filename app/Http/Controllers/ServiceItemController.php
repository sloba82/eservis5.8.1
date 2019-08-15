<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ServiceItem\ServiceItemRepository;


class ServiceItemController extends Controller
{


    private $serviceItemRepo;


    public function __construct()
    {
        $this->serviceItemRepo = new ServiceItemRepository();
    }


    public function ajaxServiceItem(Request $request){

        $data = json_decode($request->getContent(), true);
        if ($data['action'] == 'save' ){
            $this->store($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data)
    {
        $this->serviceItemRepo->save([
            'service_id' => $data['service_id'],
            'desc' => $data['desc'],
            'pieces' => $data['pieces'],
            'piece_price' => $data['piece_price'],
        ]);
        return $this->serviceItemTable($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = json_decode($request->getContent(), true);
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

<?php

namespace App\Repository\ServiceItem;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;
use App\Service;
use App\ServiceItem;


class ServiceItemRepository implements CRUDInterface
{

    public function save($params)
    {
        $id = DB::table('cars')->insertGetId([
            'service_id' => $params['service_id'],
            'desc'       => $params['desc'],
            'pieces'     => $params['pieces'],
            'piece_price'=> $params['piece_price'],
            'pdv'        => $params['pdv'],
            'total'      => $params['total'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $id;
    }

    public function serviceItemOfservices($serviceID)
    {

        $service = new Service();

        $serviceItem = $service::find($serviceID);

        dd($serviceItem->serviceItems);


        return $serviceItem->serviceItems();
    }

    public function getAll()
    {
        return ServiceItem::all();
    }

    public function getById($id)
    {
        $ServiceItem = ServiceItem::find($id);
        return $ServiceItem->toArray();

    }

    public function update($params, $id)
    {
        $ServiceItem = ServiceItem::findOrFail($id);
        $ServiceItem->update($params);
    }

    public function delete($id)
    {
        $ServiceItem = ServiceItem::find($id);
        $ServiceItem->delete();
    }

}



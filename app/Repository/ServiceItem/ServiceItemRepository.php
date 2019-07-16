<?php

namespace App\Repository\ServiceItem;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;
use App\ServiceItem;


class ServiceItemRepository implements CRUDInterface
{

    public function save($params)
    {
        $id = DB::table('cars')->insertGetId([
            'service_id' => $params['service_id'],
            'desc' => $params['desc'],
            'pieces' => $params['pieces'],
            'piece_price' => $params['piece_price'],
            'pdv' => $params['pdv'],
            'total' => $params['total'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return $id;
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

    /**
     * @param $serviceID
     * @return
     *      array and extra element 'totalSum'
     *      witch needs to be deleted from array
     *      before loop
     */
    public function serviceItem($serviceID)
    {
        $serviceItems = \App\Service::findOrFail($serviceID)->serviceItems;
        $items = [];
        $items['totalSum'] = 0;
        foreach ($serviceItems  as $serviceItem) {
            array_push(
                $items,
                [
                    'id' =>$serviceItem->id,
                    'desc' => $serviceItem->desc,
                    'pieces' => $serviceItem->pieces,
                    'piece_price' => $serviceItem->piece_price,
                    'pdv' => $serviceItem->pdv,
                    'total' => $serviceItem->total,
                ]
            );
            $items['totalSum'] += $serviceItem->total;
        }
        return $items;
    }

}



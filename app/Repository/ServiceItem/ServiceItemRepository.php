<?php

namespace App\Repository\ServiceItem;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;
use App\ServiceItem;


class ServiceItemRepository implements CRUDInterface
{

    public $totalItemSum;


    public static function save($params)
    {

        $total = self::totalItemPrice( $params['piece_price'], $params['pieces']);
        $id = DB::table('service_items')->insertGetId([
            'service_id' => $params['service_id'],
            'desc' => $params['desc'],
            'pieces' => $params['pieces'],
            'piece_price' => $params['piece_price'],
            'pdv' => 20,
            'total' => $total,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return $id;
    }

    private static function totalItemPrice($priceItem, $pieces){
        return $priceItem * $pieces;
    }

    public static function getAll()
    {
        return ServiceItem::all();
    }

    public static function getById($id)
    {
        $ServiceItem = ServiceItem::find($id);
        return $ServiceItem->toArray();
    }

    public static function update($params, $id)
    {
        $params['total'] = self::totalItemPrice($params['piece_price'], $params['pieces']);
        $ServiceItem = ServiceItem::findOrFail($id);
        $ServiceItem->update($params);
    }

    public static function delete($id)
    {
        $ServiceItem = ServiceItem::find($id);
        $ServiceItem->delete();
    }

    /**
     * @param $serviceID
     * @return
     *      array and sets 'totalSum'
     */
    public function serviceItem($serviceID)
    {
        $serviceItems = \App\Service::findOrFail($serviceID)->serviceItems;
        $items = [];
        $total = 0;
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
            $total += $serviceItem->total;
        }

        $this->totalItemSum = $total;
        return $items;
    }

}



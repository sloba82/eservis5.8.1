<?php

namespace App\Repository\Helper;

class HelperRepository
{

    /*
     *  convert string to array (string sent from card reader) Ex. :
     * "{VehicleData:{DateOfFirstRegistration:29.01.2004,YearOfProduction:2004..."
     */
    public function stringToArray($data)
    {
        $data = str_replace(['{', '}', '/', 'VehicleData:', 'DocumentData:', 'PersonalData:', '[]'], '', $data);
        $data = str_replace(',,,', ',', $data);
        $datas = explode(',', $data);

        array_push($datas, $datas[32] = $datas[32] . ' ' . $datas[33] . ' ' . $datas[34] . ' ' . $datas[35]);

        $newData = array();
        foreach ($datas as $item) {

            if (preg_match('/([^-]+):([^-]+)/', $item)) {
                $string = explode(':', $item);
            } else {
                continue;
            }

            if ($string[0] && $string[1]) {
                $newData[$string[0]] = $string[1];
            } else {
                continue;
            }
        }

        return $newData;
    }

    /**
     * @param $param 15/6/2019 20:37
     * @return string DB time data format
     */
    public function timeFormat ($param) {
        return date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $param)));
    }

}
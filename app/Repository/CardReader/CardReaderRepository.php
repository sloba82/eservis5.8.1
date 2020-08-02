<?php

namespace App\Repository\CardReader;


use App\CardReader;
use App\Repository\Helper\HelperRepository;

class CardReaderRepository
{

    private $data;
    private $rawCardData;


    public function __construct($data)
    {
        $this->setData($data);
        $this->setRawCardData($data);

    }

    public function __get($field)
    {
        return  array_key_exists($field, $this->data ) ? $this->data[$field] : null ;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $this->cardReaderDataToArray($data);
    }

    public function getRawCardData()
    {
        return $this->rawCardData;
    }

    public function setRawCardData($rawCardData)
    {
        $this->rawCardData = $rawCardData;
    }

    public function getCardRederData()
    {
        return $this->rawCardData;
    }

    public function saveRawCardReaderData()
    {
        $cardReader = new CardReader([
            'car_id' => 0,
            'card_data' => $this->rawCardData,
        ]);
        $cardReader->save();
    }

    public function cardReaderDataToArray($data)
    {
        $helper = new HelperRepository();
        return $helper->stringToArray($data);
    }


}
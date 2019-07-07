<?php

namespace App\Repository\AppCache;


use App\Repository\CRUDInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

class AppCacheRepository
{

    /**
     * @param $params
     *
     store cache indefenetly
     call object

     use App\Repository\AppCache\AppCacheRepository;
     $cache = [
            'key' => 'userCarData',
            'value' => $value
        ];
     AppCacheRepository::storeCache($cache);
     *
     *
     */
    static function storeCache($params)
    {
        Cache::put($params['key'], $params['value']);
    }

    static function checkCache($id){
        return Cache::has($id);
    }

    /**
     * @param $id
     * @return mixed
     *
     id = 'nameOfCache',
     use App\Repository\AppCache\AppCacheRepository;
     AppCacheRepository::savecache($cache);
     *
     */
    static function getCache($id){
        return Cache::get($id);
    }

    /**
     * @param $id
     * @return mixed
     *
     id = 'nameOfCache',
     use App\Repository\AppCache\AppCacheRepository;
     AppCacheRepository::deleteCache($id);
     *
     */
    static function deleteCache ($id) {
        return Cache::pull($id);
    }


}
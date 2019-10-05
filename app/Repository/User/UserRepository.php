<?php

namespace App\Repository\User;

use App\Repository\CRUDInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserRepository implements CRUDInterface
{


    public static function save($params)
    {
        $id = DB::table( 'users' )->insertGetId( [
            'name' => $params['name'],
            'email' => $params['email'],
            'last_name' => $params['last_name'],
            'password' => bcrypt( $params['password'] ),
            'address' => $params['address'],
            'city' => $params['city'],
            'phone' => $params['phone'],
            'role' => $params['role'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ] );
    }

    public static function getAll()
    {
        return User::all();
    }

    public static function getById($id)
    {
        $user = User::find( $id );
        return $user->toArray();
    }

    public static function update($params, $id)
    {
        if (!$params['password']) {
            unset( $params['password'] );
        } else {
            $params['password'] = bcrypt( $params['password'] );
        }

        $user = User::findOrFail( $id );
        $user->update( $params );
    }

    public static function delete($id)
    {
        $user = User::find( $id );
        $user->delete();
    }

}




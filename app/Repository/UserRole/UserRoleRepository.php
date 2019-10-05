<?php

namespace App\Repository\UserRole;

use App\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\CRUDInterface;

class UserRoleRepository implements CRUDInterface {

    public static function save($params)
    {
        $id = DB::table('users_roles')->insertGetId([
            'name' => $params['name'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public static function getAll()
    {
        return UserRole::all();
    }

    public static function getById($id)
    {
        $userRole = UserRole::find($id);
        return $userRole->toArray();
    }

    public static function update($params, $id)
    {
        $userRole = UserRole::findOrFail($id);
        $userRole->update($params);
    }

    public static function delete($id)
    {
        $userRole = UserRole::find($id);
        $userRole->delete();
    }

}

<?php

namespace App\Http\Controllers;

use App\Repository\Car\CarRepository;
use App\Repository\User\UserRepository;
use App\Repository\UserRole\UserRoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $userRole;

    public function __construct()
    {
        $userRole = UserRoleRepository::getAll();
        $this->userRole = $userRole->toArray();
    }

    public function index()
    {
        $allUsers =  UserRepository::getAll();
        return view('admin.user.index', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRole = $this->userRole;
        return view('admin.user.create', compact('userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        UserRepository::save($request);
        if ($request['action'] == 'addService'){
            $addCar =  CarRepository::getById($request['car_id']);
            return view('/admin/admin_service-add', compact('addCar'));
        }

        return redirect( URL::previous());
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
        $user = UserRepository::getById($id);
        $userEdit = [
            'user' => $user,
            'userRole' => $this->userRole,
        ];

        return view('admin.user.edit', compact('userEdit'));
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
        $request = $request->all();
        UserRepository::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

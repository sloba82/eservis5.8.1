<?php

namespace App\Http\Controllers;

use App\Repository\CarUser\CarUserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

class CarUserController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::where('name', 'like', '%' . '' . '%')->latest()->paginate(10);
        $availableCars = CarUserRepository::availableCars();
        return view( 'admin.caruser.index' )->with( ['users' => $users, 'availableCars' => $availableCars] );
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        CarUserRepository::save( $request );
        $userID = $request['user_id'];
        return redirect( URL::previous() . "#$userID" );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        CarUserRepository::detachCarAndUser( $id, $this->request );
        return redirect( URL::previous() . "#$id" );

    }
}

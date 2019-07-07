<?php

namespace App\Http\Controllers;

use App\Appoitment;
use App\Repository\Appointment\AppointmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class AppoitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $paginate = 10;
        $allapointments = DB::table('appoitments')
            ->orderByRaw('id DESC')
            ->where('active', 1)
            ->paginate($paginate);

        return view('admin.appointment.index', compact('allapointments'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppointmentRepository $appointmentRepository)
    {
        $params = $request->all();
        $params['user_id'] = '';
        if (Auth::user()) {
            $params['user_id'] = Auth::user()->id;
        } else {
            $params['user_id'] = 0;
        }

        $params['appoitment'] = str_replace("/", "-", $params['appoitment']);
        $params['appoitment'] .= ':00';

        $appointmentRepository->save($params);

        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, AppointmentRepository $appointmentRepository)
    {
        $Appopitment = $appointmentRepository->getById($id);
        if (!$Appopitment) {
            $Appopitment = 'Nothing to show';
        }

        return view('admin.appointment.edit', compact('Appopitment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppointmentRepository $appointmentRepository, $id)
    {
        if (strpos($request['appoitment'], '/')) {
            $dateAndTime = str_replace("/", "-", $request['appoitment']);
            $dateAndTime .= ':00';
            $request['appoitment'] = $dateAndTime;
        }

        $request['confirm'] = intval($request['confirm']);
        $appointmentRepository->update($request->all(), $id);

        return redirect('/appointment');

        /* return $this->index();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentRepository $appointmentRepository, $id)
    {
        $appointmentRepository->delete($id);
        return $this->index();
    }

    public function ajaxConfirm(Request $request, AppointmentRepository $appointmentRepository)
    {
        $id = $request['AppData']['id'];
        if ($request['AppData']['field'] == 'active') {
            $value = 0;
        } else {
            $value = 1;
        }

        if ($request['AppData']['field']) {

            $appointmentRepository->update([$request['AppData']['field'] => $value], $id);
            $data = 'test';
            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        }
    }

}




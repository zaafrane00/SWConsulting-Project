<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = reservation::all();
        return response()->json($reservations);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_user'=>['required'],
            'id_prestataire'=>['required'],
            'date_reservation'=>['required'],
            'methode_payment' => ['required'],
            'ajout_kilometrage'=>['required'],
                       ]);
           // save in DB
           $reservations  = new Reservation();
           $reservations->id_user = $request->input('id_user');
           $reservations->id_prestataire = $request->input('id_prestataire');
           $reservations->date_reservation = $request->input('date_reservation');
           $reservations->methode_payment = $request->input('methode_payment');
           $reservations->ajout_kilometrage = $request->input('ajout_kilometrage');
          

           $reservations->saveOrFail();
           return response()->json($reservations, Response::HTTP_OK); 
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
        //
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
        $this->validate($request,[
            'id_user'=>['required'],
            'id_prestataire'=>['required'],
            'date_reservation'=>['required'],
            'methode_payment' => ['required'],
            'ajout_kilometrage'=>['required'],
                       ]);
    
            $reservations = Reservation::findOrFail($id);
    
    
            $id_user=$request['id_user'];
            $id_prestataire=$request['id_prestataire'];
            $date_reservation=$request['date_reservation'];
            $methode_payment=$request['methode_payment'];
            $ajout_kilometrage=$request['ajout_kilometrage'];
    
           
           $reservations->id_user = $request->input('id_user');
           $reservations->id_prestataire = $request->input('id_prestataire');
           $reservations->date_reservation = $request->input('date_reservation');
           $reservations->methode_payment = $request->input('methode_payment');
           $reservations->ajout_kilometrage = $request->input('ajout_kilometrage');
           return  response()->json($reservations, Response::HTTP_OK);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = reservation::findOrFail($id);
        $deleted =  $reservations->delete();
        return  response()->json($reservations, Response::HTTP_OK); 
    }
}

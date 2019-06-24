<?php

namespace App\Http\Controllers\Avis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\avis;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avis = avis::all();
        return response()->json($avis);
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
            'avis'=>['required'],
            'statut'=>['required'],
            'date'=>['required'],
            'description'=>['required'],
            'idprestataire'=>['required'],
            'idcouple'=>['required'],

                       ]);
           // save in DB
           $avis  = new avis();
           $avis->avis = $request->input('avis');
           $avis->statut = $request->input('statut');
           $avis->date = $request->input('date');
           $avis->description = $request->input('description');
           $avis->idprestataire = $request->input('idprestataire');
           $avis->idcouple = $request->input('idcouple');
           $avis->saveOrFail();
           return response()->json($avis, Response::HTTP_OK);
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
            'avis'=>['required'],
            'statut'=>['required'],
            'date'=>['required'],
            'description'=>['required'],
            'idprestataire'=>['required'],
            'idcouple'=>['required'],

                       ]);
    
            $aviss= avis::findOrFail($id);
    
    
            $avis=$request['avis'];
            $statut=$request['statut'];
            $date=$request['date'];
            $description=$request['description'];
            $idprestataire=$request['idprestataire'];
            $idcouple=$request['idcouple'];
    
            $aviss->avis = $request->input('avis');
            $aviss->statut = $request->input('statut');
            $aviss->date = $request->input('date');
            $aviss->description = $request->input('description');
            $aviss->idprestataire = $request->input('idprestataire');
            $aviss->idcouple = $request->input('idcouple');
            $aviss->saveOrFail();
            return response()->json($aviss, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avis = avis::findOrFail($id);
        $deleted =  $avis->delete();
        return response()->json($avis->delete() ?  200 : 400);
    }
}

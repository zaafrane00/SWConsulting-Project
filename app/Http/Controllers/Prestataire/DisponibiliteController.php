<?php

namespace App\Http\Controllers\Prestataire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Disponibilitee;


class DisponibiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disponibilitee = Disponibilitee::all();
        return response()->json($disponibilitee);
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
            'estdisponibile'=>['required'],
            'date'=>['required'],
            'idprestataire'=>['required'],
                       ]);
           // save in DB
           $disponibilitee  = new disponibilitee();
           $disponibilitee->estdisponibile = $request->input('estdisponibile');
           $disponibilitee->date = $request->input('date');
           $disponibilitee->idprestataire = $request->input('idprestataire');
        
          

           $disponibilitee->saveOrFail();
           return response()->json($disponibilitee, Response::HTTP_OK); 
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
            'estdisponibile'=>['required'],
            'date'=>['required'],
            'idprestataire'=>['required'],
                       ]);
                     
    
            $disponibilitee = disponibilitee::findOrFail($id);
    
    
            $estdisponibile=$request['estdisponibile'];
            $date=$request['date'];
            $idprestataire=$request['idprestataire'];
          
    
        
            $disponibilitee->estdisponibile = $request->input('estdisponibile');
            $disponibilitee->date = $request->input('date');
            $disponibilitee->idprestataire = $request->input('idprestataire');
         
           
 
            $disponibilitee->saveOrFail();
            return response()->json($disponibilitee, Response::HTTP_OK);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disponibilitee = disponibilitee::findOrFail($id);
        $deleted =  $disponibilitee->delete();
        return  response()->json($disponibilitee, Response::HTTP_OK); 
    }
}

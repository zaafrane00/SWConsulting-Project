<?php

namespace App\Http\Controllers\Favoris;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Favorie;


class FavorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favories = Favorie::all();
        return response()->json($favories);
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

                       ]);
           // save in DB
           $favories  = new Favorie();
          $favories->id_user = $request->input('id_user');
           $favories->id_prestataire = $request->input('id_prestataire');
        
          

           $favories->saveOrFail();
           return response()->json($favories, Response::HTTP_OK); 
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

                       ]);
    
            $favories = favorie::findOrFail($id);
    
    
            $id_user=$request['id_user'];
            $id_prestataire=$request['id_prestataire'];
     
            $favories->id_user = $request->input('id_user');
             $favories->id_prestataire = $request->input('id_prestataire');
          
            
  
             $favories->saveOrFail();
             return response()->json($favories, Response::HTTP_OK); 
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favories = favorie::findOrFail($id);
        $deleted =  $favories->delete();
        return  response()->json($favories, Response::HTTP_OK);
    }
}

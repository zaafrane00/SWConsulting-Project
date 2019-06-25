<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Information_Specifique;

class InformationspecifiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information_Specifique::all();
        return response()->json($information);
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
            'id_list_information'=>['required'],
            'nom'=>['required'],
            'type'=>['required'],
                       ]);
           // save in DB
           $information_specifiques  = new Information_Specifique();
           $information_specifiques->id_list_information = $request->input('id_list_information');
           $information_specifiques->nom = $request->input('nom');
           $information_specifiques->type = $request->input('type');
        
          

           $information_specifiques->saveOrFail();
           return response()->json($information_specifiques, Response::HTTP_OK); 
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
            'id_list_information'=>['required'],
            'nom'=>['required'],
            'type'=>['required'],
                       ]);
    
            $information_specifiques = Information_Specifique::findOrFail($id);
    
    
            $id_list_information=$request['id_list_information'];
            $nom=$request['nom'];
            $type=$request['type'];

            $information_specifiques->id_list_information = $request->input('id_list_information');
            $information_specifiques->nom = $request->input('nom');
            $information_specifiques->type = $request->input('type');
         
           
 
            $information_specifiques->saveOrFail();
            return response()->json($information_specifiques, Response::HTTP_OK); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information_specifiques = information_specifique::findOrFail($id);
        $deleted =  $information_specifiques->delete();
        return  response()->json($information_specifiques, Response::HTTP_OK); 
    }
}

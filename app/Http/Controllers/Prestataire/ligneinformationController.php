<?php

namespace App\Http\Controllers\Prestataire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\ligne_information;

class ligneinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligne_informations = ligne_information::all();
        return response()->json($ligne_informations);
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
            'nom'=>['required'],
            'icon'=>['required'],
            'contenu'=>['required'],
            'id_prestataire'=>['required'],
                       ]);
           // save in DB
           $ligne_informations  = new ligne_information();
           $ligne_informations->icon = $request->input('icon');
           $ligne_informations->nom = $request->input('nom');
           $ligne_informations->contenu = $request->input('contenu');
           $ligne_informations->id_prestataire = $request->input('id_prestataire');
        
          

           $ligne_informations->saveOrFail();
           return response()->json($ligne_informations, Response::HTTP_OK); 
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
            'nom'=>['required'],
            'icon'=>['required'],
            'contenu'=>['required'],
            'id_prestataire'=>['required'],
                       ]);
    
            $ligne_informations = ligne_information::findOrFail($id);
    
    
            $icon=$request['icon'];
            $nom=$request['nom'];
            $contenu=$request['contenu'];
            $id_prestataire=$request['id_prestataire'];

            $ligne_informations  = new ligne_information();
            $ligne_informations->icon = $request->input('icon');
            $ligne_informations->nom = $request->input('nom');
            $ligne_informations->contenu = $request->input('contenu');
            $ligne_informations->id_prestataire = $request->input('id_prestataire');
         
           
 
            $ligne_informations->saveOrFail();
            return response()->json($ligne_informations, Response::HTTP_OK); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ligne_informations = ligne_information::findOrFail($id);
        $deleted =  $ligne_informations->delete();
        return  response()->json($ligne_informations, Response::HTTP_OK); 
    }
}

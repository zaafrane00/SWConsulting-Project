<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\fiche_information;

class FichierinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fichier = fiche_information::all();
        return response()->json($Fichier);
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
            'id_sous_categorie'=>['required'],
            'nom'=>['required'],
                       ]);
           // save in DB
           $fiche_informations  = new fiche_information();
           $fiche_informations->id_sous_categorie = $request->input('id_sous_categorie');
           $fiche_informations->nom = $request->input('nom');
        
          

           $fiche_informations->saveOrFail();
           return response()->json($fiche_informations, Response::HTTP_OK); 
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
            'id_sous_categorie'=>['required'],
            'nom'=>['required'],
                       ]);
    
            $fiche_informations = fiche_information::findOrFail($id);
    
    
            $id_sous_categorie=$request['id_sous_categorie'];
            $nom=$request['nom'];
      
        
    
           

            $fiche_informations->id_sous_categorie = $request->input('id_sous_categorie');
            $fiche_informations->nom = $request->input('nom');
         
           
 
            $fiche_informations->saveOrFail();
            return response()->json($fiche_informations, Response::HTTP_OK); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche_informations = fiche_information::findOrFail($id);
        $deleted =  $fiche_informations->delete();
        return  response()->json($fiche_informations, Response::HTTP_OK); 
    }
}

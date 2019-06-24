<?php

namespace App\Http\Controllers\Prestataire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\listePromotions;

class ListePromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'valeur'=>['required'],
            'idprestataire'=>['required'],
            'description'=>['required'],
            'datedebut'=>['required'],
            'datefin'=>['required'],

                       ]);
           // save in DB
           $liste_promotion  = new listePromotions();
           $liste_promotion->valeur = $request->input('valeur');
           $liste_promotion->idprestataire = $request->input('idprestataire');
           $liste_promotion->description = $request->input('description');
           $liste_promotion->datedebut = $request->input('datedebut');
           $liste_promotion->datefin = $request->input('datefin');
           $liste_promotion->saveOrFail();
           return response()->json($liste_promotion, Response::HTTP_OK);
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
        'valeur'=>['required'],
            'idprestataire'=>['required'],
            'description'=>['required'],
            'datedebut'=>['required'],
            'datefin'=>['required'],
            ]);
    
            $liste_promotion = listePromotions::findOrFail($id);
    
    
            $valeur=$request['valeur'];
            $idprestataire=$request['idprestataire'];
            $description=$request['description'];
            $datedebut=$request['datedebut'];
            $datefin=$request['datefin'];
    
    
            $liste_promotion->valeur = $request->input('valeur');
            $liste_promotion->idprestataire = $request->input('idprestataire');
            $liste_promotion->description = $request->input('description');
            $liste_promotion->datedebut = $request->input('datedebut');
            $liste_promotion->datefin = $request->input('datefin');
            $liste_promotion->saveOrFail();
            return response()->json($liste_promotion, Response::HTTP_OK);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liste_promotion = listePromotions::findOrFail($id);
        $deleted =  $liste_promotion->delete();
        return response()->json($liste_promotion->delete() ?  200 : 400);
    }
}

<?php

namespace App\Http\Controllers\Evenement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\evenement;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenement = evenement::all();
        return response()->json($evenement);
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
            'nom_evenement'=>['required'],
            'type_evenement'=>['required'],
            'date_debut'=>['required'],
            'heure_debut'=>['required'],
            'date_fin'=>['required'],
            'ville'=>['required'],
            'addresse'=>['required'],
            'description_evenement'=>['required'],
            'idprestataire'=>['required'],
            'idmarriage'=>['required'],


            ]);

           // save in DB
           $evenement  = new evenement();
           $evenement->nom_evenement = $request->input('nom_evenement');
           $evenement->type_evenement = $request->input('type_evenement');
           $evenement->date_debut = $request->input('date_debut');
           $evenement->heure_debut = $request->input('heure_debut');
           $evenement->date_fin = $request->input('date_fin');
           $evenement->ville = $request->input('ville');
           $evenement->description_evenement = $request->input('description_evenement');
           $evenement->addresse = $request->input('addresse');
           $evenement->idprestataire = $request->input('idprestataire');
           $evenement->idmarriage = $request->input('idmarriage');
           $evenement->saveOrFail();
           return response()->json($evenement, Response::HTTP_OK);
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
            'nom_evenement'=>['required'],
            'type_evenement'=>['required'],
            'date_debut'=>['required'],
            'heure_debut'=>['required'],
            'date_fin'=>['required'],
            'ville'=>['required'],
            'addresse'=>['required'],
            'description_evenement'=>['required'],
            'idprestataire'=>['required'],
            'idmarriage'=>['required'],
            
        ]);

        $evenement = evenement::findOrFail($id);


        $nom_evenement=$request['nom_evenement'];
        $type_evenement=$request['type_evenement'];
        $date_debut=$request['date_debut'];
        $heure_debut=$request['heure_debut'];
        $date_fin=$request['date_fin'];
        $ville=$request['ville'];
        $addresse=$request['addresse'];
        $description_evenement=$request['description_evenement'];
        $idprestataire=$request['idprestataire'];
        $idmarriage=$request['idmarriage'];
        $evenement->nom_evenement = $nom_evenement;
        $evenement->type_evenement = $type_evenement;
        $evenement->date_debut = $date_debut;
        $evenement->heure_debut = $heure_debut;
        $evenement->date_fin = $date_fin;
        $evenement->ville = $ville;
        $evenement->addresse = $addresse;
        $evenement->description_evenement = $description_evenement;
        $evenement->idprestataire = $idprestataire;
        $evenement->idmarriage = $idmarriage;


        $evenement->saveOrFail();
        return response()->json($evenement, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
  
        $evenement=evenement::findOrFail($id);
        $evenement=evenement::where('id','=',$id)->delete();
        return response()->json($evenement,200);
    }
}

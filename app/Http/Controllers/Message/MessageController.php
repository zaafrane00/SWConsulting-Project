<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = message::all();
        return response()->json($messages);
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
            'titre'=>['required'],
            'contenue'=>['required'],
            'ref_expiditeur'=>['required'],
            'ref_destintatire'=>['required'],
            'idprestataire'=>['required'],
            'id_user'=>['required'],
            


           

                       ]);

           // save in DB 
           $messages  = new message();
           $messages->titre = $request->input('titre');
           $messages->contenue = $request->input('contenue');
           $messages->ref_expiditeur = $request->input('ref_expiditeur');
           $messages->ref_destintatire = $request->input('ref_destintatire');
           $messages->idprestataire = $request->input('idprestataire');
           $messages->id_user = $request->input('id_user');
           $messages->saveOrFail();
           return response()->json($messages, Response::HTTP_OK);
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
            'titre'=>['required'],
            'contenue'=>['required'],
            'ref_expiditeur'=>['required'],
            'ref_destintatire'=>['required'],
            'idprestataire'=>['required'],
            'id_user'=>['required'],
            
        ]);

        $messages = message::findOrFail($id);


        $titre=$request['titre'];
        $contenue=$request['contenue'];
        $ref_expiditeur=$request['ref_expiditeur'];
        $ref_destintatire=$request['ref_destintatire'];
        $idprestataire=$request['idprestataire'];
        $id_user=$request['id_user'];
        $messages->titre = $titre;
        $messages->contenue = $contenue;
        $messages->ref_expiditeur = $ref_expiditeur;
        $messages->ref_destintatire = $ref_destintatire;
        $messages->idprestataire = $idprestataire;
        $messages->id_user = $id_user;


        $messages->saveOrFail();
        return response()->json($messages, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messages = message::findOrFail($id);
        $deleted =  $messages->delete();
        return response()->json($messages->delete() ?  200 : 400);
    }
}

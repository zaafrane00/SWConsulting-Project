<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\liste_invite;

class listeinviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = liste_invite::all();
        return response()->json($liste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
            'prenom'=>['required'],
            'telephone'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'idcouple'=>['required'],
            'idmarriage'=>['required'],
                       ]);
           // save in DB
           $liste_invite  = new liste_invite();
           $liste_invite->nom = $request->input('nom');
           $liste_invite->prenom = $request->input('prenom');
           $liste_invite->email = $request->input('email');
           $liste_invite->telephone = $request->input('telephone');
           $liste_invite->idcouple = $request->input('idcouple');
           $liste_invite->idmarriage = $request->input('idmarriage');

           $liste_invite->saveOrFail();
           return response()->json($liste_invite, Response::HTTP_OK);
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
            'prenom'=>['required'],
            'telephone'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'idcouple'=>['required'],
            'idmarriage'=>['required'],
                       ]);
    
            $liste_invite = liste_invite::findOrFail($id);
    
    
            $nom=$request['nom'];
            $prenom=$request['prenom'];
            $email=$request['email'];
            $telephone=$request['telephone'];
            $idcouple=$request['idcouple'];
            $idmarriage=$request['idmarriage'];
    
            $liste_invite->nom = $request->input('nom');
            $liste_invite->prenom = $request->input('prenom');
            $liste_invite->email = $request->input('email');
            $liste_invite->telephone = $request->input('telephone');
            $liste_invite->idcouple = $request->input('idcouple');
            $liste_invite->idmarriage = $request->input('idmarriage');
 
            $liste_invite->saveOrFail();
            return response()->json($liste_invite, Response::HTTP_OK); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liste_invite = liste_invite::findOrFail($id);
        $deleted =  $liste_invite->delete();
        return response()->json($liste_invite, Response::HTTP_OK); 
    }
}

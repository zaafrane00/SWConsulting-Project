<?php

namespace App\Http\Controllers\Prestataire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactpersonne;

class ContactprestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contactpersonne::all();
        return response()->json($contact);
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
         'email'=>['required'],
         'telephone'=>['required'],
         'telephoneportable'=>['required'],
         'telephonefax'=>['required'],
         'siteinternet'=>['required'],
         'idprestataire'=>['required'],
        ]);

       $_nom=$request['nom'];
       $_email=$request['email'];
       $_telephone=$request['telephone'];
       $_telephoneportable=$request['telephoneportable'];
       $_telephonefax=$request['telephonefax'];
       $_siteinternet=$request['siteinternet'];
       $_idprestataire=$request['idprestataire'];

           // save in DB
           $contact  = new Contactpersonne([
            'nom'=>$_nom,
            'email'=>$_email,
            'telephone'=>$_telephone,
            'telephoneportable'=>$_telephoneportable,
            'telephonefax'=>$_telephonefax,
            'siteinternet'=>$_siteinternet,
            'idprestataire'=>$_idprestataire,
        ]);
        $contact->saveOrFail();
        return response()->json($contact,201);

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
            'email'=>['required'],
            'telephone'=>['required'],
            'telephoneportable'=>['required'],
            'telephonefax'=>['required'],
            'siteinternet'=>['required'],
            'idprestataire'=>['required'],
           ]);

          $_nom=$request['nom'];
          $_email=$request['email'];
          $_telephone=$request['telephone'];
          $_telephoneportable=$request['telephoneportable'];
          $_telephonefax=$request['telephonefax'];
          $_siteinternet=$request['siteinternet'];
          $_idprestataire=$request['idprestataire'];

          $contact = Contactpersonne::findOrFail($id);
          $contact->nom=$_nom;
          $contact->email=$_email;
          $contact->telephone=$_telephone;
          $contact->telephoneportable=$_telephoneportable;
          $contact->telephonefax=$_telephonefax;
          $contact->siteinternet=$_siteinternet;
          $contact->idprestataire=$_idprestataire;


          $contact->saveOrFail();
          return response()->json($contact,202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contact = Contactpersonne::findOrFail($id);
        $contact->delete();
        return response()->json($contact,200);
    }
}

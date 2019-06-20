<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return response()->json($category);
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
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
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
        //$category->nom = $request->input('nom');
        //$category->icon = $request->input('icon');
        $contact->saveOrFail();
        return 'saved'  ;
         
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
        //
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
    }
}

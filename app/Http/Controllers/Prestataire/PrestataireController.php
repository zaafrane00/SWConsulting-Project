<?php

namespace App\Http\Controllers\Prestataire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestataire;
class PrestataireController extends Controller
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
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
         'prenom'=>['required'],
         'telephone'=>['required'],
         'email'=>['required'],
         'password'=>['required'],
         'description'=>['required'],
         'code_postal'=>['required'],
         'att'=>['required'],
         'ang'=>['required'],
         'tarification'=>['required'],
         'methode_payment'=>['required'],
         'ajout_kilometrage'=>['required'],
         'isactive'=>['required'],
         'isvisibile'=>['required'],
        ]);

       $_nom=$request['nom'];
       $_prenom=$request['prenom'];
       $_telephone=$request['telephone'];
       $_email=$request['email'];
       $_password=$request['password'];
       $_description=$request['description'];
       $_code_postal=$request['code_postal'];
       $_att=$request['att'];
       $_ang=$request['ang'];
       $_tarification=$request['tarification'];
       $_methode_payment=$request['methode_payment'];
       $_ajout_kilometrage=$request['ajout_kilometrage'];
       $_isactive=$request['isactive'];
       $_isvisibile=$request['isvisibile'];


        // save in DB 
        $prestataire  = new Prestataire([
            'nom'=>$_nom,
            'prenom'=>$_prenom,
            'telephone'=>$_telephone,
            'email'=>$_email,
            'password'=>$_password,
            'description'=>$_description,
            'code_postal'=>$_code_postal,
            'att'=>$_att,
            'ang'=>$_ang,
            'tarification'=>$_tarification,
            'methode_payment'=>$_methode_payment,
            'ajout_kilometrage'=>$_ajout_kilometrage,
            'isactive'=>$_isactive,
            'isvisibile'=>$_isvisibile
        ]);

   
        $prestataire->saveOrFail();
        return 'saved'  ;
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

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
        $prestataire = Prestataire::all();
        return response()->json($prestataire);

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
         'idville'=>['required'],
         'id_sous_category'=>['required'],
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
       $_idville=$request['idville'];
       $_id_sous_category=$request['id_sous_category'];


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
            'isvisibile'=>$_isvisibile,
            'idville'=>$_idville,
            'id_sous_category'=>$_id_sous_category,
        ]);

   
        $prestataire->saveOrFail();
        return response()->json($prestataire,201);
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
         'isactive'=>['required'],
         'isvisibile'=>['required'],
         'idville'=>['required'],
         'id_sous_category'=>['required'],
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
        $_isactive=$request['isactive'];
        $_isvisibile=$request['isvisibile'];
        $_idville=$request['idville'];
        $_id_sous_category=$request['id_sous_category'];

        $prestataire = Prestataire::findOrFail($id);

        
        $prestataire->nom=$_nom;
        $prestataire->prenom=$_prenom;
        $prestataire->telephone=$_telephone;
        $prestataire->email=$_email;
        $prestataire->password=$_password;
        $prestataire->description=$_description;
        $prestataire->code_postal=$_nom;
        $prestataire->att=$_att;
        $prestataire->ang=$_ang;
        $prestataire->tarification=$_tarification;
        $prestataire->methode_payment=$_methode_payment;
        $prestataire->isactive=$_isactive;
        $prestataire->isvisibile=$_isvisibile;
        $prestataire->idville=$_idville;
        $prestataire->id_sous_category=$_id_sous_category;

        $prestataire->saveOrFail();
        return response()->json($prestataire,202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestataire = Prestataire::findOrFail($id);
        $deleted =  $prestataire->delete();
        return response()->json($prestataire->delete() ?  200 : 400);
      
    }
}

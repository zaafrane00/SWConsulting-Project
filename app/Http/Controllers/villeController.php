<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ville;
class villeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ville=ville::all();
      return response()->json($ville);
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
            'idpays'=>['required'],
                       ]);
           // save in DB 
           $ville  = new ville();
           $ville->nom = $request->input('nom');
           $ville->idpays = $request->input('idpays');

           $ville->saveOrFail();
           return 'saved' ;
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
        ]);

        $ville = ville::findOrFail($id);
       

        $nom=$request['nom'];

        $ville->nom=$nom;

        $ville->saveOrFail();
        return 'saved'  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ville=ville::where('id',$id)->delete();
        return 'deleted';
    }
}

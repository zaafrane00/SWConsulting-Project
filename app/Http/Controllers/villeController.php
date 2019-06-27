<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ville;
use Illuminate\Http\Response;
use App\user;
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
            'isactive'=>['required'],
            'idgev'=>['required'],
                       ]);
           // save in DB
           $ville  = new ville();
           $ville->nom = $request->input('nom');
           $ville->idpays = $request->input('idpays');
           $ville->isactive = $request->input('isactive');
           $ville->idgev = $request->input('idgev');

           $ville->saveOrFail();
           return response()->json($ville, Response::HTTP_OK);
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
        'isactive'=>['required'],
        'idpays'=>['required'],
        'idgev'=>['required'],
        ]);

        $ville = ville::findOrFail($id);


        $nom=$request['nom'];
        $isactive=$request['isactive'];
        $idpays=$request['idpays'];
        $idgev=$request['idgev'];

        $ville->nom=$nom;
        $ville->isactive=$isactive;
        $ville->idpays=$idpays;
        $ville->idgev=$idgev;

        $ville->saveOrFail();
        return  response()->json($ville, Response::HTTP_OK);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ville=ville::findOrFail($id);
        $user=user::where('idville','=',$id)->get();

        if(count($user)>0)
        {
            return response()->json($ville,406);
        }

        else{

        $pays=pays::where('id','=',$id)->delete();

        return response()->json($ville,200);
    }
    }
    
}

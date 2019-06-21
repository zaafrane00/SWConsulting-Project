<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\pays;
use App\ville;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payss = pays::all();
        return response()->json($payss);
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
        {
            $this->validate($request,[
             'nom'=>['required'],
                        ]);
            // save in DB 
            $pays  = new pays();
            $pays->nom = $request->input('nom');
            $pays->saveOrFail();
            return response()->json($pays, Response::HTTP_OK);
        }
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
        ]);

        $pays = pays::findOrFail($id);
       

        $nom=$request['nom'];

        $pays->nom=$nom;

        $pays->saveOrFail();
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
         $s_pays=pays::findOrFail($id);
        $s_ville=ville::where('idpays','=',$id)->get();
 
        if(count($s_ville)>0)
        {
            return response()->json($s_pays,406);
        } 
        
        else{
       
        $pays=pays::where('id','=',$id)->delete();

        return response()->json($s_pays,200);
    }
    }
}

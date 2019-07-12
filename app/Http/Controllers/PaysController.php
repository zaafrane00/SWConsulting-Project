<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Illuminate\Support\Facades\Auth;
use App\pays;
use App\ville;
use App\user;
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
            $userConncter =Auth::user();

     if((Auth::user()->role)=="admin" )
            {
            $this->validate($request,[
             'nom'=>['required'],
             'isactive'=>['required'],
             'icone'=>['required'],

                        ]);
            // save in DB
            $pays  = new pays();
            $pays->nom = $request->input('nom');
            $pays->isactive = $request->input('isactive');
            $pays->icone = $request->input('icone');
            $pays->saveOrFail();
           return response()->json($pays, Response::HTTP_OK);}

           else {
           return 'non';}

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

        $userConncter =Auth::user();

        if((Auth::user()->role)=="admin" )
               {

        $this->validate($request,[
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
        'isactive'=>['required'],
        'icone'=>['required'],

        ]);

        $pays = pays::findOrFail($id);


        $nom=$request['nom'];
        $isactive=$request['isactive'];
        $icone=$request['icone'];

        $pays->nom=$nom;
        $pays->isactive=$isactive;
        $pays->icone=$icone;

        $pays->saveOrFail();

        return response()->json($pays, 200);
    }


        else {
        return 'non';}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                  if((Auth::user()->role)=="admin" )
                    {
         $s_pays=pays::findOrFail($id);
        $s_ville=ville::where('idgev','=',$id)->get();

        if(count($s_ville)>0)
        {
                 return response()->json($s_pays,406);
        }

        else{

        $pays=pays::where('id','=',$id)->delete();

        return response()->json($s_pays,200);
        }
            }   else
            {
                   return response()->json($pays, 406);
            }
    }
}

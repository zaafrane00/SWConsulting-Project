<?php

namespace App\Http\Controllers\lieux;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use  Illuminate\Support\Facades\Auth;
use App\ville;
use App\Gouvernement;
use App\user;

class GouvernementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Gouvernement = Gouvernement::all();
        return response()->json($Gouvernement);
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
        $userConncter =Auth::user();
      
        if((Auth::user()->role)=="admin" )
               {
               $this->validate($request,[
                'nom'=>['required'],
                'code_postal'=>['required'],
                'idpays'=>['required'],
                'isactive'=>['required'],
                
                           ]);
                           
                           // save in DB
                           $Gouvernement  = new Gouvernement();
                           $Gouvernement->nom = $request->input('nom');
                           $Gouvernement->code_postal = $request->input('code_postal');
                           $Gouvernement->idpays = $request->input('idpays');
                           $Gouvernement->isactive = $request->input('isactive');
                           $Gouvernement->saveOrFail();
                          return response()->json($Gouvernement, Response::HTTP_OK);}
   
              else {
              return 'non';}
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
        $userConncter =Auth::user();
      
        if((Auth::user()->role)=="admin" )
               {
    
                $this->validate($request,[
                    'nom'=>['required'],
                    'code_postal'=>['required'],
                    'idpays'=>['required'],
                    'isactive'=>['required'],
                               ]);

        $Gouvernement = Gouvernement::findOrFail($id);


        $nom=$request['nom'];
        
        $code_postal=$request['code_postal'];
        
        $idpays=$request['idpays'];
        $isactive=$request['isactive'];

                           $Gouvernement->nom = $request->input('nom');
                           $Gouvernement->code_postal = $request->input('code_postal');
                           $Gouvernement->idpays = $request->input('idpays');
                           $Gouvernement->isactive = $request->input('isactive');
                           $Gouvernement->saveOrFail();
       return response()->json($Gouvernement, Response::HTTP_OK);}
       
    


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
         $Gouvernement=Gouvernement::findOrFail($id);
        $s_ville=ville::where('idgev','=',$id)->get();

        if(count($s_ville)>0)
        {
                 return response()->json($Gouvernement,406);
        }

        else{

        $Gouvernement=Gouvernement::where('id','=',$id)->delete();

        return response()->json($Gouvernement,200);
        }
            }   else
            {
                    return 'non';
            }
    }
}

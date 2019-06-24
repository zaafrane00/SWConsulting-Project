<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\galeriephoto;
use App\photo;

class GaleriePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeriephoto = galeriephoto::all();
        return response()->json($galeriephoto);
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
            'titre'=>['required'],
            'idprestataire'=>['required'],
            'logo'=>['required'],
            'photo_principale'=>['required'],

                       ]);
           // save in DB
           $galeriephoto  = new galeriephoto();
           $galeriephoto->titre = $request->input('titre');
           $galeriephoto->idprestataire = $request->input('idprestataire');
           $galeriephoto->logo = $request->input('logo');
           $galeriephoto->photo_principale = $request->input('photo_principale');
           $galeriephoto->saveOrFail();
           return response()->json($galeriephoto, Response::HTTP_OK);
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
            'titre'=>['required'],
            'idprestataire'=>['required'],
            'logo'=>['required'],
            'photo_principale'=>['required'],
            ]);
    
            $galeriephoto = galeriephoto::findOrFail($id);
    
    
            $titre=$request['titre'];
            $idprestataire=$request['idprestataire'];
            $logo=$request['logo'];
            $photo_principale=$request['photo_principale'];
    
           $galeriephoto->titre = $request->input('titre');
           $galeriephoto->idprestataire = $request->input('idprestataire');
           $galeriephoto->logo = $request->input('logo');
           $galeriephoto->photo_principale = $request->input('photo_principale');
           $galeriephoto->saveOrFail();
           return response()->json($galeriephoto, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeriephoto=galeriephoto::findOrFail($id);
        $photo=photo::where('idgalerie','=',$id)->get();

        if(count($photo)>0)
        {
            return response()->json($galeriephoto,406);
        }

        else{

        $galeriephoto=galeriephoto::where('id','=',$id)->delete();

        return response()->json($galeriephoto,200);
    }
}
}

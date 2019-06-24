<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\GalerieVideo;
use App\Video;

class GalerieVideoController extends Controller
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
        {
            $this->validate($request,[
             'titre'=>['required'],
             'idprestataire'=>['required'],

                        ]);
            // save in DB
            $galerie_video  = new GalerieVideo();
            $galerie_video->titre = $request->input('titre');
            $galerie_video->idprestataire = $request->input('idprestataire');
            $galerie_video->saveOrFail();
            return response()->json($galerie_video, Response::HTTP_OK);
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
        ]);

        $galerie_video = GalerieVideo::findOrFail($id);


        $titre=$request['titre'];
        $idprestataire=$request['idprestataire'];

        $galerie_video->titre=$titre;
        $galerie_video->idprestataire=$idprestataire;
        $galerie_video->saveOrFail();
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
        $galerie_video=GalerieVideo::findOrFail($id);
        $videos=video::where('idgalerie','=',$id)->get();

        if(count($videos)>0)
        {
            return response()->json($galerie_video,406);
        }

        else{

        $galerie_video=GalerieVideo::where('id','=',$id)->delete();

        return response()->json($galerie_video,200);
    }
    }
}

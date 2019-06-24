<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\photo;

class PhotoController extends Controller
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
            'url'=>['required'],
            'description'=>['required'],
            'idgalerie'=>['required'],

                       ]);
           // save in DB
           $photo  = new photo();
           $photo->url = $request->input('url');
           $photo->description = $request->input('description');
           $photo->idgalerie = $request->input('idgalerie');
           $photo->saveOrFail();
           return response()->json($photo, Response::HTTP_OK);
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
            'url'=>['required'],
            'description'=>['required'],
            'idgalerie'=>['required'],


                       ]);
    
            $photo= photo::findOrFail($id);
    
    
            $url=$request['url'];
            $description=$request['description'];
            $daidgaleriete=$request['idgalerie'];
          
    
            $photo->url = $request->input('url');
            $photo->description = $request->input('description');
            $photo->idgalerie = $request->input('idgalerie');
            $photo->saveOrFail();
            return response()->json($photo, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = photo::findOrFail($id);
        $deleted =  $photo->delete();
        return response()->json($photo->delete() ?  200 : 400);
    }
}

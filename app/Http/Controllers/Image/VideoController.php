<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Video;
class VideoController extends Controller
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
           $videos  = new video();
           $videos->url = $request->input('url');
           $videos->description = $request->input('description');
           $videos->idgalerie = $request->input('idgalerie');
           $videos->saveOrFail();
           return response()->json($videos, Response::HTTP_OK);
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

        $videos  = new video();


        $url=$request['url'];
        $description=$request['description'];
        $idgalerie=$request['idgalerie'];

        $videos->url = $request->input('url');
           $videos->description = $request->input('description');
           $videos->idgalerie = $request->input('idgalerie');

        $videos->saveOrFail();
        return response()->json($videos, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videos = video::findOrFail($id);
        $deleted =  $videos->delete();
        return response()->json($videos->delete() ?  200 : 400);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\marriage;

class marriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marriage = marriage::all();
        return response()->json($marriage);
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
             'id_user'=>['required'],
             'description'=>['required'],
             'date_marriage'=>['required'],
             'id_lieu'=>['required'],

             ]);

            // save in DB
            $marriage  = new marriage();
            $marriage->id_user = $request->input('id_user');
            $marriage->description = $request->input('description');
            $marriage->date_marriage = $request->input('date_marriage');
            $marriage->id_lieu = $request->input('id_lieu');

            $marriage->saveOrFail();
            return response()->json($marriage, Response::HTTP_OK);
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
            'id_user'=>['required'],
            'description'=>['required'],
            'date_marriage'=>['required'],
            'id_lieu'=>['required'],
        ]);

        $marriage = marriage::findOrFail($id);


        $id_user=$request['id_user'];
        $description=$request['description'];
        $date_marriage=$request['date_marriage'];
        $id_lieu=$request['id_lieu'];
        
        $marriage->id_user = $id_user;
        $marriage->description = $description;
        $marriage->date_marriage = $date_marriage;
        $marriage->id_lieu = $id_lieu;


        $marriage->saveOrFail();
        return response()->json($marriage, Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marriage = marriage::findOrFail($id);
        $deleted =  $marriage->delete();
        return response()->json($marriage->delete() ?  200 : 400);
    }
}

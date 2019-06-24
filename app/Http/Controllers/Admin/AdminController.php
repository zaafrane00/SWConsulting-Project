<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = admin::all();
        return response()->json($liste);
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
             'nom'=>['required'],
             'prenom'=>['required'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required'],
             'telephone'=>['required'],
             


            

                        ]);

            // save in DB 
            $admin  = new admin();
            $admin->nom = $request->input('nom');
            $admin->prenom = $request->input('prenom');
            $admin->email = $request->input('email');
            $admin->password =Hash::make($request['password']);
            $admin->telephone = $request->input('telephone');
            $admin->saveOrFail();
            return response()->json($admin, Response::HTTP_OK);
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
            'nom'=>['required'],
            'prenom'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'telephone'=>['required'],
        ]);

        $admin = admin::findOrFail($id);


        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $email=$request['email'];
        $password=Hash::make($request['password']);
        $telephone = $request['telephone'];

        $admin->nom = $nom;
        $admin->prenom = $prenom;
        $admin->email = $email;
        $admin->password = $password;
        $admin->telephone = $telephone;
        $admin->saveOrFail();
        return response()->json($admin, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=admin::findOrFail($id);
        $admin=admin::where('id','=',$id)->delete();
        return response()->json($admin,200);
    }
}

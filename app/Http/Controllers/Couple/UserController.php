<?php

namespace App\Http\Controllers\Couple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=user::all();
      return response()->json($user);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required',Rule::in(User::role )]
        ]);
        $User  = new User();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = Hash::make($request['password']);
        $User->image = $request->input('image');
        $User->idville = $request->input('idville');
        $User->isactive = $request->input('isactive');
        $User->role = $request->input('role');

        $User->saveOrFail();
        return response()->json($User, Response::HTTP_OK);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required',Rule::in(User::role )]
        ]);

        $User = User::findOrFail($id);


        $name=$request['name'];
        $email=$request['email'];
        $password=$request['password'];
        $image=$request['image'];
        $idville=$request['idville'];
        $isactive=$request['isactive'];
        $role=$request['role'];

        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = Hash::make($request['password']);
        $User->image = $request->input('image');
        $User->idville = $request->input('idville');
        $User->isactive = $request->input('isactive');
        $User->role = $request->input('role');

        $User->saveOrFail();
        return response()->json($User, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $deleted =  $User->delete();
        return response()->json($User->delete() ?  200 : 400);
    }
}

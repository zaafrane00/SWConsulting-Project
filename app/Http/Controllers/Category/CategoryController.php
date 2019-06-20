<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Categorie;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categorie::all();
        return response()->json($category);

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
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
         'icon'=>['required']
        ]);

       $nom=$request['nom'];
       $icon=$request['icon'];


        // save in DB 
        $category  = new Categorie([
            'nom'=>$nom,
            'icon'=>$icon
        ]);
        //$category->nom = $request->input('nom');
        //$category->icon = $request->input('icon');
        $category->saveOrFail();
        return 'saved'  ;
         
        //if($category->save()){}



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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

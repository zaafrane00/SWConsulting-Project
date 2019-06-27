<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Sous_Categorie;
use  Illuminate\Support\Facades\Auth;
use App\user;
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
        $userConncter =Auth::user();
      
        if((Auth::user()->role)=="admin" )
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
           return response()->json($category,201);

             }


        else {
             return 'non';}
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
       // $userConncter =Auth::user();
      
        if((Auth::user()->role)=="admin" )
               {
        $this->validate($request,[
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
         'icon'=>['required']
        ]);

        $category = Categorie::findOrFail($id);



        $nom=$request['nom'];
        $icon=$request['icon'];

        $category->nom=$nom;
        $category->icon=$icon;

        $category->saveOrFail();
        return response()->json($category,202);}

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
        //$category = Categorie::findOrFail($id);
        $s_category = Sous_Categorie::where('id_categorie','=',$id)->get();
        if(count($s_category)){
            return response()->json($category,406);
        }
         else{
        $category = Categorie::findOrFail($id);
        $category->delete();
         return response()->json($category,200);
         }

    }
}

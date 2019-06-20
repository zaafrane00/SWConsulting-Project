<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
use App\Sous_Categorie;
class Sous_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s_category = Sous_Categorie::all();
        return response()->json($s_category);
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
         'icon'=>['required'],
         'idcategorie'=>['required']
        ]);

       $nom=$request['nom'];
       $idcategorie=$request['idcategorie'];
       $icon=$request['icon'];
     


        // save in DB 
        $s_category  = new Sous_Categorie([
            'nom'=>$nom,
            'id_categorie'=>$idcategorie,
            'icon'=>$icon
        ]);
        //$category->nom = $request->input('nom');
        //$category->icon = $request->input('icon');
        $s_category->saveOrFail();
        return 'saved'  ;
         
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
        'nom'=>['required',/*Rule::in(Categorie::NAMES)*/],
         'icon'=>['required'],
         'idcategorie'=>['required']
        ]);

        $s_category = Sous_Categorie::findOrFail($id);

        $nom=$request['nom'];
        $idcategorie=$request['idcategorie'];
        $icon=$request['icon'];
     
        $s_category->nom=$nom;
        $s_category->id_categorie=$idcategorie;        
        $s_category->icon=$icon;


        $s_category->saveOrFail();
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
        $s_category=Sous_Categorie::where('id_sous_categorie',$id)->delete();
        return 'deleted';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sous_Categorie extends Model
{
    protected $table = 'sous__categories';
    protected $fillable = [ 'id_sous_categorie','nom','icon','id_categorie'];

    
    /*const NAMES = [
     self::NAME_ORGANISATION,
     self::NAME_LIEUX,
    ];*/

    protected $primaryKey = 'id_sous_categorie';
    public function Categorie()
    {
        return $this->belongsTo('App\Sous_Categorie', 'id_categorie');
    }


}

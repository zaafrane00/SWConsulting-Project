<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id_categories', 'nom','icon'];
    /*const NAME_ORGANISATION = 'organisation';
    const NAME_LIEUX = 'lieux';
    const NAMES = [
     self::NAME_ORGANISATION,
     self::NAME_LIEUX,
    ];*/


    public function Sous_Categorie()
    {
        return $this->hasMany('App\Sous_Categorie', 'id_sous_categorie');
    }
    public function Prestataire()
    {
        return $this->hasMany('App\Prestataire', 'id_prestataire');
    }
}

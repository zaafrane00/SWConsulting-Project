<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'Categorie';
    protected $fillable = ['id_categories', 'nom'];

    public function Sous_Categorie()
    {
        return $this->hasMany('App\Sous_Categorie', 'id_sous_categorie');
    }
    public function Prestataire()
    {
        return $this->hasMany('App\Prestataire', 'id_prestataire');
    }
}

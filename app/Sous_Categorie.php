<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sous_Categorie extends Model
{
    protected $table = 'Sous_Categorie';
    protected $fillable = ['id_sous_categorie', 'nom'];

    public function Categorie()
    {
        return $this->belongsTo('App\Sous_Categorie', 'id_categorie');
    }


}

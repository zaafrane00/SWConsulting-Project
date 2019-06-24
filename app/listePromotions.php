<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listePromotions extends Model
{
    protected $table = 'liste_promotion';
    protected $fillable = ['id','valeur','description','datedebut','datefin','idprestataire'];
    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }
}

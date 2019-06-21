<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    protected $table = 'evenement';
    protected $fillable = [
        'id','nom_evenement','type_evenement','date_debut','heure_debut','date_fin','ville',
        'addresse', 'description_evenement', 'idprestataire','idmarriage'
   ];

   public function Prestataire()
   {
       return $this->belongsTo('App\Prestataire','id_prestataire');
   }

   //manich mthabt mineha
   public function marriage()
   {
       return $this->hasOne('App\marriage','id');
   }
}

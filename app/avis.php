<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avis extends Model
{
    protected $table = 'avis';
    protected $fillable = [
        'avis','statut','date','description'
   ];
   public function user()
   {
       return $this->belongsTo('App\User','id');
   } 
    public function Prestataire()
   {
       return $this->belongsTo('App\Prestataire','id_prestataire');
   }
}

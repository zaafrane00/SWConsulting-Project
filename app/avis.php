<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avis extends Model
{
    protected $table = 'avis';
    protected $fillable = [
       'id','avis','statut','date','description','id_prestataire','idcouple'
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

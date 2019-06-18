<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avis extends Model
{
    protected $fillable = [
        'avis','statut','date','description'
   ];
   public function coupel()
   {
       return $this->belongsTo('App\coupel');
   }  public function Prestataire()
   {
       return $this->belongsTo('App\Prestataire');
   }
}

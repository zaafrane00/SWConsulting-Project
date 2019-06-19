<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    protected $table = 'evenement';
    protected $fillable = [
        'nom','email','telephone','telephoneportable','telephonefax','siteinternet'
   ];

   public function Prestataire()
   {
       return $this->belongsTo('App\Prestataire','id_prestataire');
   } 

   //manich mthabt mineha
   public function marriage()
   {
       return $this->belongsTo('App\marriage','id');
   } 
}

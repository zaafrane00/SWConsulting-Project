<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactpersonne extends Model
{
    protected $fillable = [
        'nom','email','telephone','telephoneportable','telephonefax','siteinternet'
   ];
   public function Prestataire()
{
    
        return $this->belongsTo('App\Prestataire');
    
}
}

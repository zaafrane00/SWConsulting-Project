<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactpersonne extends Model
{
    protected $table = 'Contactpersonne';
    protected $fillable = [
        'id','nom','email','telephone','telephoneportable','telephonefax','siteinternet','idprestataire'
   ];
   public function Prestataire()
{
    
        return $this->belongsTo('App\Prestataire');
    
}
}

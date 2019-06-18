<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    protected $fillable = [
        'id_user','id_prestataire'
   ];


   public function user()
   {
       return $this->hasMany('App\User');
   }
   

}

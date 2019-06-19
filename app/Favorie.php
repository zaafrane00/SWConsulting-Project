<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    protected $table = 'Favorie';
    protected $fillable = [
        'id_user','id_prestataire'
   ];


   public function user()
   {
       return $this->belongsTo('App\User');
   }
   

}

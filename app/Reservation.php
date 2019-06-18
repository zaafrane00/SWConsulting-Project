<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'id_user','id_prestataire',
   ];


   public function user()
   {
       return $this->belongsTo('App\User');
   }

}

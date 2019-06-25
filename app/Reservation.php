<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'id_user','id_prestataire','ajout_kilometrage','methode_payment','date_reservation'
   ];


   public function user()
   {
       return $this->belongsTo('App\User');
   }
   public function Prestataire()
   {
       return $this->belongsTo('App\Prestataire');
   }

}

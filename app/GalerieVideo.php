<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalerieVideo extends Model
{
    protected $table = 'galerie_video';
    protected $fillable = [
        'id','titre','idprestataire'
   ];

   public function Video()
   {
   return $this->hasmany('App\photo');
   }
}

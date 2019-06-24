<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galeriephoto extends Model
{
    protected $table = 'galeriephoto';
    protected $fillable = [
        'id','titre','idprestataire','photo_principale','logo'
   ];
}

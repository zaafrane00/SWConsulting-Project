<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galeriephoto extends Model
{
    protected $table = 'galeriephoto';
    protected $fillable = ['id','titre','logo','photo_principale','idprestataire'];
    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }
}

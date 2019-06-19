<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalerieVideo extends Model
{
    protected $table = 'GalerieVideo';
    protected $fillable = ['id','titre','idprestataire'];
    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }
}

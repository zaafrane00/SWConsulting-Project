<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['id','url','description','idgalerie'];
    public function GalerieVideo()
    {
    return $this->belongsTo('App\GalerieVideo');
    }
}

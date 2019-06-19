<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'Video';
    protected $fillable = ['id','url','description','idgalerie'];
    public function galerievideo()
    {
    return $this->belongsTo('App\GalerieVideo');
    }
}

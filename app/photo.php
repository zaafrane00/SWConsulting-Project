<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $fillable = ['id','url','description','idgalerie'];
    public function galeriephoto()
    {
    return $this->belongsTo('App\galeriephoto');
    }
}

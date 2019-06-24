<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = 'photo';
    protected $fillable = ['id','url','description','idgalerie'];
    public function galeriephoto()
    {
    return $this->belongsTo('App\galeriephoto');
    }
}

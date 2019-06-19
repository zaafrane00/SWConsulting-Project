<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galerie_marriage extends Model
{
    protected $table = 'galerie_marriage';
    protected $fillable = ['id','estdisponibile','date','idprestataire'];
    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }
}

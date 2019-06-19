<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilitee extends Model
{
    protected $fillable = ['id','estdisponibile','date','idprestataire'];

    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = 'governorate';
    protected $fillable = [
        'id', 'nom', 'code_postal','idpays'
    ];


    public function Pays()
    {
        return $this->belongsTo('App\pays');
    }
}

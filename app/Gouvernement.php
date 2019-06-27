<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gouvernement extends Model
{
    protected $table = 'gouvernement';
    protected $fillable = [
        'id', 'nom', 'code_postal','idpays'
    ];

   
    public function Pays()
    {
        return $this->hasmany('App\pays');
    }
}

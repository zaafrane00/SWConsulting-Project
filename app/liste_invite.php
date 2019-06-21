<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class liste_invite extends Model
{
    protected $table = 'liste_invite';
    protected $fillable = [
        'name', 'prenom', 'email','telephone'
    ];

   
    public function evenement()
    {
        return $this->hasmany('App\evenement');
    }
}

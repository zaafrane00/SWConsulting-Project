<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class liste_invite extends Model
{
    protected $fillable = [
        'name', 'prenom', 'email', 'idcouple','idevenement'
    ];

    public function user()
    {
        return $this->hasmany('App\User');
    }
    public function evenement()
    {
        return $this->hasmany('App\evenement');
    }
}

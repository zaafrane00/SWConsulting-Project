<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'Admin';
    protected $fillable = [
        'nom','prenom','email','password','telephone'
   ];
   public function ville()
   {
    return $this->hasMany('App\ville');
   
   }
 
}


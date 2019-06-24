<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'nom','prenom','email','password','telephone'
   ];
   public function ville()
   {
    return $this->hasMany('App\ville');
   
   }
   public function Prestataire()
   {
   return $this->hasmany('App\Prestataire');
   }
   public function User()
   {
   return $this->hasmany('App\User');
   }
}


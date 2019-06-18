<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nom','prenom','email','password','telephone'
   ];
   public function ville()
   {
       
   }
}


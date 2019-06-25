<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ligne_information extends Model
{
    
    protected $table = 'ligne_informations';
    protected $fillable = ['id','nom','icon','contenu','idprestataire'];

}

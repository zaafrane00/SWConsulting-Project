<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fiche_information extends Model
{
    protected $table = 'fiche_information';
    protected $fillable = [
        'id','id_sous_categorie','nom'
   ];
}

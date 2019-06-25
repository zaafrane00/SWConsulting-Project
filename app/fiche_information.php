<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fiche_information extends Model
{
    protected $table = 'fiche_informations';
    protected $fillable = [
        'id','nom','id_sous_categorie'
       ];
}

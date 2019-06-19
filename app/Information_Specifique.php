<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information_Specifique extends Model
{
    protected $table = 'Information_Specifique';
    protected $fillable = ['id','nom','type','id_list_information'];

    public function Sous_Categorie()
    {
        return $this->hasmany('App\Sous_Categorie');
    }
}

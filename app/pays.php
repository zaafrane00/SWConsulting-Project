<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    protected $fillable = [
        'nom','isactive','icone'
   ];


    public function ville()
{
    return $this->hasMany('App\ville');
}

}

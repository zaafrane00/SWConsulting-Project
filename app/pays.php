<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    protected $table = 'pays';
    protected $fillable = [
        'nom'
   ];


    public function ville()
{
    return $this->hasMany('App\ville');
}

}

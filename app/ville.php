<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    protected $fillable = [
        'nom','idpays'
   ];


    public function pays()
{
    return $this->belongsTo('App\pays');
}
public function User()
{
    return $this->hasMany('App\User');
}
public function admin()
{
    return $this->belongsTo('App\admin');
}

}
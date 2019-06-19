<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marriage extends Model
{
    protected $table = 'marriage';
    protected $fillable = [
        'id_user', 'description', 'date_marriage','id_lieu'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Prestataire()
{
    return $this->hasMany('App\Prestataire','id_prestataire');
}

public function galerie_marriage()
{
    return $this->hasMany('App\marriage','id');
}


}

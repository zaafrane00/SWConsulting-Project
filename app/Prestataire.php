<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{

    protected $table = 'Prestataire';
    protected $fillable = ['id_prestataire', 'nom','prenom','telephone','email','password','description',
    'code_postal','att','ang','tarification','methode_payment','ajout_kilometrage','isactive','isvisibile'
];
    


    public function Sous_Categorie()
    {
        return $this->belongsTo('App\Sous_Categorie','id_sous_categorie');
    }
    public function Contactpersonne()
    {
            return $this->belongsTo('App\Prestataire');
    }
    public function marriage()
    {
            return $this->hasMany('App\marriage','id');
    }
    public function evenement()
    {
            return $this->hasMany('App\evenement','id');
    }
    public function reservation()
    {
            return $this->hasMany('App\Reservation','id');
    }
    public function galeriephoto()
    {
            return $this->hasMany('App\galeriephoto','id');
    }
    public function GalerieVideo()
    {
            return $this->hasMany('App\galeriephoto','id');
    }
    public function message()
    {
            return $this->hasMany('App\message','id');
    }
    public function avis()
    {
            return $this->hasMany('App\avis','id');
    }



    
      
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{

   
    protected $fillable = ['id_prestataire', 'nom','prenom','telephone','email','password','description',
    'code_postal','tarification','methode_payment','ajout_kilometrage'];
    


    public function Sous_Categorie()
    {
        return $this->belongsTo('App\Sous_Categorie','id_sous_categorie');
    }
    public function Contactpersonne()
    {
        
            return $this->belongsTo('App\Prestataire');
        }


    
      
}


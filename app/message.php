<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $table = 'message';
    protected $fillable = ['id','titre','contenue','ref_expiditeur','ref_destintatire','idprestataire','id_user'];
    public function Prestataire()
    {
    return $this->belongsTo('App\Prestataire');
    }
    public function User()
    {
    return $this->belongsTo('App\User');
    }
}

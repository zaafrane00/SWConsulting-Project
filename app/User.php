<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'date mariage' ,'image','idville'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function ville()
    {
        return $this->belongsTo('App\ville');
    }


    public function liste_invite()
    {
         return $this->belongsTo('App\liste_invite');
    }   
    public function favories()
    {
        return $this->hasMany('App\Favorie','id_favorie');
    }   
    public function Prestataire()
    {
    return $this->hasMany('App\Prestataire');
    }

    public function Admin()
    {
         return $this->belongsTo('App\Admin');
    }  
    public function avis()
    {
         return $this->hasMany('App\avis');
    }  
}
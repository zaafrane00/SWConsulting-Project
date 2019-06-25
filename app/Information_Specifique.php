<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information_Specifique extends Model
{
    protected $table = 'information__specifiques';
    protected $fillable = [
        'id','nom','id_list_information','type'
       ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Un profile n'a qu'un auteur
    public function user(){
        return $this->belongsTo(User::class);
    }

    
}

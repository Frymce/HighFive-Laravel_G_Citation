<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blague extends Model
{
    protected $fillable = [
        'content',
        'author',
        'user_id',
    ];

    public function getRouteKeyName(){
        return 'id';
    }




    //une blague ne peut que avoir un seul auteur
    public function user(){
        return $this->belongsTo(User::class);
    }
}

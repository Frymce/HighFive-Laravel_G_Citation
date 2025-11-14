<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* @use HasFactory<\Database\Factories\ArticleFactory>
*/
class Citation extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'author',
        'is_published'
    ];

    public function getRouteKeyName(){
        return 'id';
    }

    //Une citation a un auteur
    public function user(){
        return $this->belongsTo(User::class);
    }

    //une citation peut avoir plusieurs likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //une citation peut etre deliker
    public function unliker(){
        return $this->hasOne(Like::class);
    }

    //une citation est liker par un utilisateur
    public function isLikedBy(User $user){
        return $this->likes()->where('user_id', $user->id)->first();
    }
}

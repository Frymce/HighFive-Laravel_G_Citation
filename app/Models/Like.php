<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'citation_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function citation(){
        return $this->belongsTo(Citation::class);
    }
}

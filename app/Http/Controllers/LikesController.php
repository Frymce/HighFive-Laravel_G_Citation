<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    // public function like($id){
    //     $citation = Citation::findOrFail($id);
    //     $user = auth()->user();

    //     //Vérification si c'est déjà liké
    //     if ($citation->isLikedBy($user)) {
    //         //Suppression du like
    //         $citation->likes()->where('user_id', $user->id)->delete();
    //         return back()->with(['success_message' => 'Le like a été supprimé avec succès !']);
    //     }
    //     //Création du like
    //     $citation->likes()->create([
    //         'user_id' => $user->id,
    //         'citation_id' => $citation->id,
    //     ]);
    //     return back()->with(['success_message' => 'Citation likée !']);

    // }
}

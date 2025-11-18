<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get()->toArray();
        return view('users.show', compact('users'));
    }

    public function moi(){
        return view('users.moi');
    }

    public function edit(Request $request, User $user)
    {
        $user->update($request->all());
        // dd('');
        return redirect('/users')->with(['success_message' => 'L\'utilisateur a été modifié avec succès !']);

    }
}

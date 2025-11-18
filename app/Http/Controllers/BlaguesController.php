<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Blague;
use Illuminate\Http\Request;

class BlaguesController extends Controller
{
    public function index()
    {
        $blagues = Blague::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('blagues.show', compact('blagues'));
    }
    public function create(Blague $blagues )
    {
    $user = Auth::user();
        $blagues = [];

        if ($user) {
            $blagues = Blague::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        }
        // dd($citations);
        return view('blagues.create', compact('blagues'));
    }

    public function store(Request $request)
    {
    //Vérification des permissions
    $user = Auth::user();
        if ($user) {
            $request['user_id'] = $user->id;
        }

        //Vérification des conditions sur les champs
        $validateCitation = $request->validate([
            "_token" => "required",
            "content" => "required|string|min:3|max:255",
            "author" => "required|string|min:3|max:255",
            'user_id' => 'required|numeric|exists:users,id',
        ]);

        //Enrégistrement de la citation dans la base de donnée
        $blagues = Blague::create($validateCitation);
        return redirect('/blagues/create')->with(['success_message' => 'La blague a été créée avec succès !']);
    }

     public function edit(Blague $blague)
    {
        return view('blagues.edit', compact('blague'));
    }

    public function update(Request $request, Blague $blague)
    {
        $blague->update($request->all());
        return redirect('/blagues')->with(['success_message' => 'La blague a été modifiée avec succès !']);
    }

    public function delete(Request $request, Blague $blague)
    {
        $blague->delete();
        return redirect('/blagues')->with(['success_message' => 'La blague a été supprimée avec succès !']);
    }

}

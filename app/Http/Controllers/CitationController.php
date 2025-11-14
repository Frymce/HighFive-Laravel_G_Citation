<?php

namespace App\Http\Controllers;

use App\Models\Citation;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class CitationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }

    public function index()
    {
        $citations = Citation::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('citations.show', compact('citations'));
    }

    public function create(Citation $citation)
    {
    $user = Auth::user();
        $citations = [];

        if ($user) {
            $citations = Citation::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        }
        // dd($citations);
        return view('citations.create', compact('citations'));
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
            'user_id' => 'required|numeric|exists:users,id',
            "author" => "required|string|min:3|max:255",
        ]);

        //Enrégistrement de la citation dans la base de donnée
        $citations = Citation::create($validateCitation);
        return redirect('/citation/create')->with(['success_message' => 'La citation a été créée avec succès !']);
    }

    public function edit(Citation $citation)
    {
        return view('citations.edit', compact('citation'));
    }

    public function update(Request $request, Citation $citation)
    {
        $citation->update($request->all());
        return redirect('/citation')->with(['success_message' => 'La citation a été modifiée avec succès !']);
    }

    public function delete(Request $request, Citation $citation)
    {
        $citation->delete();
        return redirect('/citation')->with(['success_message' => 'La citation a été supprimée avec succès !']);
    }

    public function like(Request $request, Citation $citation){
        $user = Auth::user();
    }
}

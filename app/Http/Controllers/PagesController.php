<?php

namespace App\Http\Controllers;

use App\Models\Citation;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('layouts.master');
    }

    public function accueil(){
        $citations = Citation::with('user')->orderBy('created_at', 'DESC')->limit(5)->get()->toArray();
        return view('layouts.accueil', compact('citations'));
    }

    public function about(){
        return view('layouts.apropos');
    }

    public function g_citation(){
        return view('layouts.gestionCitation');
    }
}

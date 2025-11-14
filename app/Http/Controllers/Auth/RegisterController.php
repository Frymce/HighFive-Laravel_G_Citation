<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validator($request->all());

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $user = User::where('email', $request['email'])->firstOrFail();
        Auth::login($user);
        session()->flash('success_message', 'Votre compte a été créé avec succès !');

        return redirect('/');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateUser = $request->validate([
            "_token"=>"required",
            "name"=>"required|string|min:3|max:255",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|string|min:8|confirmed:password_confirmation",
            "password_confirmation"=>"required|same:password",
        ]);
        // dd($validateUser);
        $user = User::create($validateUser);
        return redirect()->route('login')->with(['success_message' => 'L\'utilisateur a été créé avec succès !']);
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name'=>'require|string',
            'email'=>'require|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed'
        ]);
    }
}

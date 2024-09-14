<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{


    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $userAttributers = $request->validate([
            'name'=> ['required'],
            'email'=> ['required', 'email', 'unique:users,email'],
            'password'=> ['required', 'confirmed', Password::min(6)],
        ]);

        $employerAttributers = $request->validate([
            'employer'=> ['required'],
            'logo'=> ['required', File::types(['png','jpg','webp'])],

        ]);

       $logoPath = $request->logo->store('logos');

        $user = User::create($userAttributers);

        $user->employer()->create([
            'name' => $employerAttributers['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/');
    }

}

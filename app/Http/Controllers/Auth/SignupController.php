<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class SignupController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index () {
        return view('auth.signup');
    }

    public function signup (Request $request) {
        $rules = [
            'name' => 'required',
            'email' => "required|email",
            'password' => "required|confirmed",
        ];

        $this->validate($request, $rules);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect('/dashboard')->with('msg', "$request->name User Has ben created");
    }
}

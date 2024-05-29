<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Reg_User; 

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register_view()
    {
        return view('register');
    }


    public function register(Request $req)
    {
        $req->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'max:255',
            'address' => 'max:255',
            'country' => 'required|string|max:255',
            'designation' => 'max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = Reg_User::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'address' => $req->address,
            'country' => $req->country,
            'designation' => $req->designation,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful.');
    }
    public function show_user()
    {
        if (Auth::check()) {
            $user = Auth::user();

            return view('users.home', ['user' => $user]);
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

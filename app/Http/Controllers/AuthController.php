<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index_login()
    {
        return view('auth.login');
    }

    public function index_register()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'no_telepon' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
        ]);

        $credentials['password'] = bcrypt($request->password);

        $user = User::create($credentials);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Login failed!');
    }

    public function logout(Request $request)
    {
        if(Auth::user()->check()){
            Auth::user()->logout();
        }
        return redirect('/login');
    }
}

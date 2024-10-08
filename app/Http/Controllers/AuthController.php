<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:users|max:18',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect(route('login'))->with('success', 'Account created successfully');
        }
        return redirect(route('register'))->with('error', 'Failed to create account')->withInput();
    }

    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'username' => 'required|string|max:18',
            'password' => 'required|string|min:8|max:255',
        ]);

        $credentials = [
            'name' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Username or password is incorrect')->withInput();
    }
}

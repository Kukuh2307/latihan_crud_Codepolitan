<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('article');
        } else {
            return redirect('login')->with('error_massage', 'Username atau password salah');
        }
    }

    // menampilkan form register
    public function registerForm()
    {
        return view('auth.register');
    }

    // menambahkan data user ke dalam database
    public function register(Request $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');

        // User::create([
        //     'email' => $email,
        //     'password' => $password
        // ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // validasi register
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        // menambahkan data ke database
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}

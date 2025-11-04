<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credential = [
            "name" => $request->username,
            "password" => $request->password
        ];

        if (auth()->attempt($credential)) {
            $user = User::where('name', $request->username)->first();

            //* login untuk admin
            if ($user->hasRole('admin')) {
                return redirect()->route('adminYysDashboard');
            }

            //* login untuk pendaftar
            else if ($user->hasRole('pendaftar')) {
                return redirect()->route('operatorDashboard');
            }

        } else {
            return redirect()->back()->with('error', 'Username atau Password anda salah');
        }
    }


    public function viewRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required"
        ]);

        if ($validate->fails()) {
            return redirect()->route('gelombang.create')->withErrors($validate)->withInput();
        }

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);

        return redirect()->route("")->with("anda berhasil membuat akun");
    }





    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}

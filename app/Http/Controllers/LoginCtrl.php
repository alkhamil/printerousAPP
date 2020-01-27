<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// declare model
use App\User;

class LoginCtrl extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login_proses(Request $request)
    {
        $person = User::where('email', $request->email)->first();
        if ($person !== null) {
            if (password_verify($request->password, $person->password)) {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                return redirect('/dashboard');
            }else {
                $request->session()->flash('message', 'Password salah!');
                return back();
            }
        }else {
            $request->session()->flash('message', 'Akun tidak terdaftar!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

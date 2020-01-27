<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

// declare model
use App\User;
use App\Organization;
use App\Role;

class UserCtrl extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $organizations = Organization::all();
        $roles = Role::all();
        return view('user.create', compact('organizations', 'roles'));
    }

    public function create_proses(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required',
        //     'password' => 'required|string|min:6',
        //     'file' => 'required',
        // ]);
        $user = new User;
        $user->name = $request->name;
        $user->organization_id = $request->org_id;
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->avatar = $request->file('avatar')->store('avatar/');
        if ($user->save()) {
            $request->session()->flash('message', 'Data berhasil tersimpan!');
            return redirect('user');
        }
    }
}

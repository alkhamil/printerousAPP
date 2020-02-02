<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// declare model
use App\Organization;
use App\User;
use App\Role;

class OrganizationCtrl extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organization.index', compact('organizations'));
    }

    public function details(Request $request)
    {
        $organization = Organization::where('id', $request->org_id)->first();  
        return view('organization.detail', compact('organization'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function create_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:organizations,email',
            'phone' => 'required',
            'website' => 'required',
            'logo' => 'required',
        ]);
        $organization = new Organization;
        $organization->name = $request->name;
        $organization->phone = $request->phone;
        $organization->email = $request->email;
        $organization->website = $request->website;
        $organization->logo = $request->file('logo')->store('uploads/logo');
        if ($organization->save()) {
            $request->session()->flash('message', 'Data berhasil tersimpan!');
            return redirect('organization');
        }
    }

    public function update($id)
    {
        $organization = Organization::where('id', decrypt($id))->first();
        return view('organization.update', compact('organization'));
    }

    public function update_proses(Request $request)
    {
        $organization = Organization::where('id', $request->id)->first();
        if ($organization !== null) {
            $organization->name = $request->name;
            $organization->phone = $request->phone;
            $organization->email = $request->email;
            $organization->website = $request->website;
            if ($organization->save()) {
                $request->session()->flash('message', 'Data berhasil terubah!');
                return redirect('organization');
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        $organization = Organization::where('id', decrypt($id))->first();
        if ($organization !== null) {
            if (Organization::destroy(decrypt($id))) {
                if ($organization->logo !== null) {
                    $logo = public_path().'/'.$organization->logo;
                    if (file_exists($logo)) {
                        unlink($logo);
                    }
                }
                foreach ($organization->users as $key => $user) {
                    User::destroy($user->id);
                    if ($user->avatar !== null) {
                        $avatar = public_path().'/'.$user->avatar;
                        if (file_exists($avatar)) {
                            unlink($avatar);
                        }
                    }
                }
                $request->session()->flash('message', 'Data berhasil terhapus!');
                return redirect('organization');
            }
        }
    }

    public function settings($id)
    {
        $organization = Organization::where('id', decrypt($id))->first();
        return view('organization.setting', compact('organization'));
    }

    public function modal_add(Request $request)
    {
        $organizations = Organization::all();
        $roles = Role::all();
        return view('organization.modal_add', compact('organizations', 'roles'));
    }

    public function modal_add_proses(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|min:6',
            'avatar' => 'required',
        ]);
        $user = new User;
        $user->organization_id = $request->org_id;
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->avatar = $request->file('avatar')->store('uploads/avatar');
        if ($user->save()) {
            $request->session()->flash('message', 'Data berhasil tersimpan!');
            return redirect('user');
        }
    }

    public function modal_edit(Request $request)
    {
        $organizations = Organization::all();
        $roles = Role::all();
        $user = User::where('id', $request->user_id)->first();
        return view('organization.modal_edit', compact('organizations', 'roles', 'user'));
    }

    public function modal_edit_proses(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user !== null) {
            $user->organization_id = $request->org_id;
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if ($request->password !== null) {
                $user->password = Hash::make($request->password);
            }else {
                $user->password = $user->password;
            }
            if ($user->save()) {
                $request->session()->flash('message', 'Data berhasil terupdate!');
                return back();
            }
        }
    }

    public function modal_delete_proses(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if ($user !== null) {
            if (User::destroy($id)) {
                if ($user->avatar !== null) {
                    $avatar = public_path().'/'.$user->avatar;
                    if (file_exists($avatar)) {
                        unlink($avatar);
                    }
                }
                $request->session()->flash('message', 'Data berhasil terhapus!');
                return back();
            }
        }
    }
}

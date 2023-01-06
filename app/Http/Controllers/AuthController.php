<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{

    function index()
    {
        return view('home');
    }

    function logout(){
        session()->forget("Auth");
        return redirect()->route('index');
    }

    function authenticating(Request $request)
    {
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('scmdashboard');
        }
        return redirect('/login');
    }

    function ProfileSuperAdmin(){
        return view('SuperAdmin.profileSuperAdmin');
    }

    function settingSuperAdmin(){
        return view('SuperAdmin.SettingAkunSuperAdmin');
    }

    function ProfileAdmin(){
        return view('Admin.profileAdmin');
    }

    function settingAdmin(){
        return view('Admin.SettingAkunAdmin');
    }

    function ProfilePegawai(){
        return view('Pegawai.profilePegawai');
    }

    function settingPegawai(){
        return view('Pegawai.SettingAkunPegawai');
    }

    function EditProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $user = Users::find($user_id);

        if($request->password) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'nullable|confirmed|min:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $request->validate([
                    'name' => 'required',
                    'username' => 'required',
                    'password' => 'nullable|confirmed|min:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                ]);

                $updated = $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);

                if($updated) {
                    Auth::logout();
                    return redirect()->route('index');
                }

                return back()->with('fail', 'failed to update profile');

                if($updated) {
                    return back()->with('success', 'Profile updated succesfully');
                }
            } else {
                return back()->with('old_password', 'Old password does not match!');
            }
        }

        $updated = $user->update([
            'name' => $request->name,
            'username' => $request->username
        ]);

        if($updated) {
            return back()->with('success', 'Profile updated succesfully');
        }

        return back()->with('fail', 'failed to update profile');
    }

}

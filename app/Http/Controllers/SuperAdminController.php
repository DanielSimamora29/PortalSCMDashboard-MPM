<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Roles;
use App\Models\Plants;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class SuperAdminController extends Controller
{
    function DaftarUserAdmin(Request $request){
        return view('SuperAdmin.UserAdmin');
    }

    function tampilDaftarUserAdmin(Request $request){
        //View Daftar User dimana role sebagai Admin
        $daftaruser = Users::all()->where("role_id", "2");
        return view('SuperAdmin.UserAdmin', [
            "daftarusers" => $daftaruser
        ]);
    }

    function DaftarUserPegawai(Request $request){
        return view('SuperAdmin.UserPegawai');
    }

    function tampilDaftarUserPegawai(Request $request){
        //View Daftar User dimana role sebagai Pegawai
        $daftaruser = users::all()->where("role_id", "3");
        return view('SuperAdmin.UserPegawai', [
            "daftarusers" => $daftaruser
        ]);
    }

    function TambahUserAdmin(Request $request){
        $role = Roles::get();
        $plant = Plants::get();


        return view("SuperAdmin.TambahUserAdmin", [
            'roles' => $role,
            'plants' => $plant
        ]);
    }

    function TambahUserAdminProcess(Request $request){
        $profile = "../assets/profile/default.png";
        if ($request->hasFile("profile")) {
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;

            $file->move(public_path() . '/profile/user/', $name);

            $profile = '/profile/user/' . $name;
        }
        DB::table('users')->insert(
            array(
                    'name'     =>   $request->name,
                    'username'     =>   $request->username,
                    'password'     =>   Hash::make('MPM2022'),
                    'role_id'     =>   $request->role_id,
                    'plants_id'     =>   $request->plants_id,
                    'dashboard_link'     =>   $request->dashboard_link,
                    'profile'     =>   $profile,
                   'created_at'=>date("Y-m-d H:i:s"),
                   'updated_at'=>date("Y-m-d H:i:s")
            ));
            return redirect()->back()->with('success', 'Berhasil menambahkan User Admin');
    }

    function TambahUserPegawai(Request $request){
        $role = Roles::get();
        $plant = Plants::get();

        return view("SuperAdmin.TambahUserPegawai", [
            'roles' => $role,
            'plants' => $plant
        ]);
    }

    function TambahUserPegawaiProcess(Request $request){
        $profile = "../assets/profile/default.png";
        if ($request->hasFile("profile")) {
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;

            $file->move(public_path() . '/profile/user/', $name);

            $profile = '/profile/user/' . $name;
        }
        DB::table('users')->insert(
            array(
                    'name'     =>   $request->name,
                    'username'     =>   $request->username,
                    'password'     =>   Hash::make('MPM2022'),
                    'role_id'     =>   $request->role_id,
                    'plants_id'     =>   $request->plants_id,
                    'dashboard_link'     =>   $request->dashboard_link,
                    'profile'     =>   $profile,
                   'created_at'=>date("Y-m-d H:i:s"),
                   'updated_at'=>date("Y-m-d H:i:s")
            ));
            return redirect()->back()->with('success', 'Berhasil menambahkan User Pegawai');
    }

    function LihatDaftarUserAdmin(Request $request, $id){
        $detail_user= Users::where("id", $id)->first();

        return view('SuperAdmin.ViewDaftarUserAdmin', ["detail" => $detail_user]); 
    }

    public function EditDataAdmin($id)
    {
        $role = Roles::get();
        $plant = Plants::get();
        $detail_user = Users::where("id", $id)->first();
            
        return view('SuperAdmin.EditDaftarUserAdmin', [
            "roles" => $role,
            "plants" => $plant,
            "detail" => $detail_user
        ]);   
    }

    function UpdateDataAdmin(Request $request, Users $user) {
        
        $updated = $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'plants_id' => $request->plants_id,
            'dashboard_link' => $request->dashboard_link
        ]);
        if($updated) {
            return redirect('/DaftarUserAdmin')->with('success', 'Data User Admin Berhasil Diubah');
        }
        return redirect()->back()->with('fail', 'Gagal');
    }

    function LihatDaftarUserPegawai(Request $request, $id){
        $detail_user= Users::where("id", $id)->first();

        return view('SuperAdmin.ViewDaftarUserPegawai', ["detail" => $detail_user]); 
    }

    public function EditDataPegawai($id)
    {
        $role = Roles::get();
        $plant = Plants::get();
        $detail_user = Users::where("id", $id)->first();
            
        return view('SuperAdmin.EditDaftarUserPegawai', [
            "roles" => $role,
            "plants" => $plant,
            "detail" => $detail_user
        ]);   
    }

    function UpdateDataPegawai(Request $request, Users $user) {

        $updated = $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'plants_id' => $request->plants_id,
            'dashboard_link' => $request->dashboard_link
        ]);

        if($updated) {
            return redirect('/DaftarUserPegawai')->with('success', 'Data User Pegawai Berhasil Diubah');
        }

        return redirect()->back()->with('fail', 'Gagal');

    }
}

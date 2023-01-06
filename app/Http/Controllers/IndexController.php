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

class IndexController extends Controller
{
    public function index(){
        // $role = Roles::all();


        if (Auth::user()->role_id == "1"){
            return view('dashboard');
        }elseif (Auth::user()->role_id == "2"){
            return view('dashboard');
        }elseif (Auth::user()->role_id == "3"){
            return view('dashboard');
        }
        return view('dashboard');
    }
}

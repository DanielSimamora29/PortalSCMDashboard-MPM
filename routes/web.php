<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/login', 'AuthController@login')->name('login');

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/login', [AuthController::class, 'authenticating'])->name('login');
Route::get('/login', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'ceklevel:1,2,3']], function () {
    Route::get('/scmdashboard', [IndexController::class, 'index'])->name('scmdashboard');
});

Route::group(['middleware' => ['auth', 'ceklevel:1']], function() {
    Route::get('/ProfileSuperAdmin', [AuthController::class, 'profileSuperAdmin'])->name('ProfileSuperAdmin');
    Route::post('/EditProfileSuperAdmin', [AuthController::class, 'editprofile'])->name('EditProfileSuperAdmin');
    Route::get('/SettingSuperAdmin', [AuthController::class, 'settingSuperAdmin'])->name('SettingSuperAdmin');
    Route::post('/SettingSuperAdmin', [AuthController::class, 'editpassword'])->name('EditSettingSuperAdmin');
    Route::get('/DaftarUserAdmin', [SuperAdminController::class, 'DaftarUserAdmin'])->name('DaftarUserAdmin');
    Route::get('/DaftarUserAdmin', [SuperAdminController::class, 'tampilDaftarUserAdmin'])->name('DaftarUserAdmin');
    Route::get('/DaftarUserPegawai', [SuperAdminController::class, 'DaftarUserPegawai'])->name('DaftarUserPegawai');
    Route::get('/DaftarUserPegawai', [SuperAdminController::class, 'tampilDaftarUserPegawai'])->name('DaftarUserPegawai');
    Route::get('/TambahUserAdmin/add', [SuperAdminController::class, 'TambahUserAdmin'])->name('TambahUserAdmin');
    Route::post('/TambahUserAdmin/add', [SuperAdminController::class, 'TambahUserAdminProcess'])->name('TambahUserAdmin.submit');
    Route::get('/TambahUserPegawai/add', [SuperAdminController::class, 'TambahUserPegawai'])->name('TambahUserPegawai');
    Route::post('/TambahUserPegawai/add', [SuperAdminController::class, 'TambahUserPegawaiProcess'])->name('TambahUserPegawai.submit');
    Route::get('/viewAdmin/{id}', [SuperAdminController::class, 'LihatDaftarUserAdmin'])->name("LihatDaftarUserAdmin");
    Route::get('/editdataAdmin/{id}', [SuperAdminController::class, 'EditDataAdmin'])->name("EditDataAdmin");
    Route::post('/updatedataAdmin/{user}', [SuperAdminController::class, 'UpdateDataAdmin'])->name("UpdateDataAdmin.submit");
    Route::get('/viewPegawai/{id}', [SuperAdminController::class, 'LihatDaftarUserPegawai'])->name("LihatDaftarUserPegawai");
    Route::get('/editdataPegawai/{id}', [SuperAdminController::class, 'EditDataPegawai'])->name("EditDataPegawai");
    Route::post('/updatedataPegawai/{user}', [SuperAdminController::class, 'UpdateDataPegawai'])->name("UpdateDataPegawai.submit");
});


Route::group(['middleware' => ['auth', 'ceklevel:2']], function() {
    Route::get('/ProfileAdmin', [AuthController::class, 'profileAdmin'])->name('ProfileAdmin');
    Route::post('/EditProfileAdmin', [AuthController::class, 'editprofile'])->name('EditProfileAdmin');
    Route::get('/SettingAdmin', [AuthController::class, 'settingAdmin'])->name('SettingAdmin');
    Route::post('/SettingAdmin', [AuthController::class, 'editpassword'])->name('EditSettingAdmin');

});


Route::group(['middleware' => ['auth', 'ceklevel:3']], function() {
    Route::get('/ProfilePegawai', [AuthController::class, 'profilePegawai'])->name('ProfilePegawai');
    Route::post('/EditProfilePegawai', [AuthController::class, 'editprofile'])->name('EditProfilePegawai');
    Route::get('/SettingPegawai', [AuthController::class, 'settingPegawai'])->name('SettingPegawai');
    Route::post('/SettingPegawai', [AuthController::class, 'editpassword'])->name('EditSettingPegawai');

});


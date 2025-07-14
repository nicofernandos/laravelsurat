<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'login']);

Route::controller(AdminController::class)->group(function () {
    // Route::get('admin', 'index');
    Route::get('panel/dashboard', 'dashboard');

    // akun
    Route::get('panel/usersdaftar', 'usersdaftar');
    Route::get('panel/userstambah', 'userstambah');
    Route::post('panel/userstambahsimpan', 'userstambahsimpan');
    Route::get('panel/usersedit/{id}', 'usersedit');
    Route::post('panel/userseditsimpan/{id}', 'userseditsimpan');
    Route::get('panel/usershapus/{id}', 'usershapus');


    // profil
    Route::get('panel/profil', 'profil');
    Route::get('panel/profiledit', 'profiledit');
    Route::post('panel/profileditsimpan', 'profileditsimpan');



    //kategori 
    Route::get('panel/kategori', 'kategori');
    Route::get('panel/tambahkategori', 'tambahkategori');
    Route::post('panel/tambahkategorisimpan', 'tambahkategorisimpan');
    Route::get('panel/editkategori/{id}', 'editkategori');
    Route::post('panel/editkategorisimpan/{id}', 'editkategorisimpan');
    Route::get('panel/hapuskategori/{id}', 'hapuskategori');

    //Surat
    Route::get('panel/surat', 'surat');
    Route::get('panel/tambahsurat', 'tambahsurat');
    Route::post('panel/tambahsuratsimpan', 'tambahsuratsimpan');
    Route::get('panel/editsurat/{id}', 'editsurat');
    Route::post('panel/editsuratsimpan/{id}', 'editsuratsimpan');
    Route::get('panel/hapussurat/{id}', 'hapussurat');
    Route::get('panel/suratkategori/{idkategori}', 'suratkategori');
    Route::get('panel/detailsurat/{id}', 'detailsurat');
    Route::get('panel/cetaksurat/{id}', 'cetaksurat');



    Route::get('panel/logout', 'logout');
});

Route::controller(HomeController::class)->group(function () {

    Route::get('daftar', 'daftar');
    Route::post('daftarsimpan', 'daftarsimpan');
    Route::get('loginakun', 'login');
    Route::post('logincek', 'logincek');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
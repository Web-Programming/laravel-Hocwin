<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// route ke profile
Route::get('/profil', function () {
    return view('profil');
});

// route dengan parameter (wajib)
Route::get('/mahasiswa/{nama}', function ($nama = "Hocwin") {
    echo "<h1>Halo Nama saya $nama</h2>";
});

// route dengan parameter (tidak wjb)
Route::get('/mahasiswa/{nama?}', function ($nama = "Hocwin") {
    echo "<h1>Halo Nama saya $nama</h2>";
});

// route dengan parameter lbh dari 1
Route::get('/profil/{nama}/{pekerjaan?}', function ($nama = "Hocwin", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo Nama saya $nama dan saya adalah $pekerjaan</h1>";
});

// Redirect
Route::get('/hubungi', function () {
    echo "<h1>Hubungi kami</h1>";
})->name("call"); //named route

Route::redirect("/contact", "/hubungi");

Route::get('/halo', function () {
    echo "<a href = '". route('call'). "'>" . route('call'). "</a>";
});

// Route Group
Route::prefix("/dosen")->group(function () {
    Route::get("/jadwal", function(){
        echo "<h1>Jadwwal Dosen</h1>";
    });
    Route::get("/materi", function(){
        echo "<h1>Materi Perkuliahan</h1>";
    });
});

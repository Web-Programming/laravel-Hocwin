<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\Mahasiswacontroller;
use App\Http\Controllers\ProdiController;
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
// Route::get('/mahasiswa/{nama}', function ($nama = "Hocwin") {
//     echo "<h1>Halo Nama saya $nama</h2>";
// });

// route dengan parameter (tidak wjb)
// Route::get('/mahasiswa/{nama?}', function ($nama = "Hocwin") {
//     echo "<h1>Halo Nama saya $nama</h2>";
// });

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

// Pertemuan View
Route::get('/dosen', function(){
        return view('dosen');
});

Route::get('/dosen/index', function(){
        return view('dosen.index');
});

Route::get('/fakultas', function(){
        return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
});

Route::get('/fakultas', function(){
    return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa",
    "Fakultas Ilmu Ekonomi"]]);
});

Route::get('/fakultas', function(){
    return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa",
    "Fakultas Ilmu Ekonomi"]);
});

Route::get('/fakultas', function(){
   $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
   return view('fakultas.index',compact('fakultas'));
});

Route::get('/fakultas', function(){
    $kampus = "Universitas Multi Data Palembang";
   $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
   return view('fakultas.index',compact('fakultas', 'kampus'));
});

Route::GET('/prodi', [ProdiController::class, 'index']);

Route::resource("/kurikulum", KurikulumController::class);

Route::apiResource("/dosen", DosenController::class);

Route::get("/mahasiswa/insert-elq", [Mahasiswacontroller::class, 'insertElq']);
Route::get("/mahasiswa/update-elq", [Mahasiswacontroller::class, 'updateElq']);
Route::get("/mahasiswa/delete-elq", [Mahasiswacontroller::class, 'deleteElq']);
Route::get("/mahasiswa/select-elq", [Mahasiswacontroller::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq', [ProdiController::class,'allJoinElq']);
Route::get('/mahasiswa/all-join-elq', [Mahasiswacontroller::class,'allJoinElq']);

Route::get('/prodi/create', [ProdiController::class,'create'])->name('prodi.create');
Route::post('prodi/store', [ProdiController::class,'store']);

Route::get('prodi', [ProdiController::class,'index'])->name('prodi.index');
Route::get('prodi/{prodi}', [ProdiController::class,'show'])->name('prodi.show');
Route::get('prodi/{prodi}/edit', [ProdiController::class,'edit'])->name('prodi.edit');
Route::patch('prodi/{prodi}', [ProdiController::class,'update'])->name('prodi.update');
Route::delete('prodi/{prodi}', [ProdiController::class,'destroy'])->name('prodi.destroy');

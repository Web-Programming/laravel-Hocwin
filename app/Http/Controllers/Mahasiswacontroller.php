<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class Mahasiswacontroller extends Controller
{
    public function insertElq(){
        // single assignment
        // $mhs = new Mahasiswa();
        // $mhs->nama = 'Hocwin Hebert';
        // $mhs->npm = "2226250078";
        // $mhs->tempat_lahir = "London";
        // $mhs->tanggal_lahir = date("Y-m-d");
        // $mhs->save();
        // dump($mhs);

        $mhs = Mahasiswa::insert(
            [
            [
                'nama' => 'Adrian',
                'npm' => '2226250081',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => date('Y-m-d'),
                'prodi_id'=>'1'
            ],
            [
                'nama' => 'Satria',
                'npm' => '2226250033',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => date('Y-m-d'),
                'prodi_id'=>'1'
            ]
            ]
            );
            dump($mhs);
    }
    public function updateElq(){
        $mahasiswa = Mahasiswa::where('npm','2226250078')->first();
        $mahasiswa->nama = 'Super Wynz';
        $mahasiswa->save();
        dump($mahasiswa);
    }
    public function deleteElq(){
        $mahasiswa = Mahasiswa::where('npm','2226250033')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }
    public function selectElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();

        return view("mahasiswa.index", ['allmahasiswa' => $mahasiswa, 'kampus'=> $kampus]);
    }

    public function allJoinElq(){
        $kampus= "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view ('mahasiswa.index',['allmahasiswa'=> $mahasiswas,'kampus'=> $kampus]);
    }
}

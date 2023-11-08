<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // jika nama table beda
    protected $tab = "mahasiswas";

    // untuk mengatur kolom yang boleh di isi saat mass assignment
    protected $fillable = ['npm', 'nama','tempat_lahir', 'tanggal_lahir'];

    // untuk mengatur kolom yang tidak boleh di isi
    protected $guard =[];

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }
}

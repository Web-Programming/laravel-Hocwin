@extends('layout.master')
@section('title', 'Halaman Prodi')

@section('content')
<h2>Program Studi</h2>
<table border='2px' class="table table-striped">
    <thead>
        <tr align="center">
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Prodi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allmahasiswaprodi as $item)
        <tr align="center">
            <td>{{$item->npm}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->nama_prodi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

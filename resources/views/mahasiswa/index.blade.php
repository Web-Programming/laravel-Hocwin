@extends('layout.master')
@section('title', 'Halaman Mahasiswa')

@section('content')
<h2>Mahasiswa</h2>
<table border="2px" class="table table-striped">
    <thead>
        <tr align="center">
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Prodi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allmahasiswa as $item)
        <tr align="center">
            <td>{{$item->npm}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->prodi->nama}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

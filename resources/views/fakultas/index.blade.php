<!-- @include('layout.header', ['title' => 'Halaman Fakultas']) -->

@extends('layout.master')
@section("title", 'Halaman Fakultas')

@section('content')
<h2>Fakultas</h2>
<!-- <ul>
    @foreach ($fakultas as $item)
    <li>{{$item}}</li>
    @endforeach
</ul> -->

<ul>
    @if(count($fakultas) >0)
        @foreach($fakultas as $item)
            <li>{{$item}}</li>
        @endforeach
    @else
        <li>Belum ada data</li>
    @endif
</ul>

<x-alert/>
<input/form-alert/>
@endsection

<!-- @include('layout.footer') -->
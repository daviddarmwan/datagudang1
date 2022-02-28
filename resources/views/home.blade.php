@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard - Tanggal/Waktu: <span id="tanggalwaktu"</span></h1>
    <script>
        var dt = new Date();
        document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Selamat Datang {{ Auth::user()->name }} Di Aplikasi Data Gudang</p>
                </div>
            </div>
        </div>
    </div>
@stop

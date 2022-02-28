@extends('adminlte::page')
@section('title', 'Edit Data')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data</h1>
@stop
@section('content')
    <form action="{{route('gudang.update', $gudang)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_nota">Nomor Nota</label>
                        <input type="text" class="form-control @error('no_nota') is-invalid @enderror" id="no_nota" placeholder="Nomor Nota" name="no_nota" value="{{$gudang->no_nota ?? old('no_nota')}}">
                        @error('no_nota') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" placeholder="Nomor Nota" name="nama_supplier" value="{{$gudang->nama_supplier ?? old('nama_supplier')}}">
                        @error('nama_supplier') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                     {{-- SM size with single date/time config --}}
                     @php
                     $config = [
                         'singleDatePicker' => true,
                         'showDropdowns' => true,
                         'minYear' => 2000,
                         'maxYear' => "js:parseInt(moment().format('YYYY'),10)",
                         'timePicker' => true,
                         'timePicker24Hour' => true,
                         'timePickerSeconds' => true,
                         'cancelButtonClasses' => 'btn-danger',
                         'locale' => ['format' => 'YYYY-MM-DD HH:mm:ss'],
                     ];
                 @endphp
                 <x-adminlte-date-range name="tanggal_order" value="{{$gudang->tanggal_order ?? old('tanggal_order')}}" label="Tanggal Order" igroup-size="sm" :config="$config">
                     <x-slot name="appendSlot">
                         <div class="input-group-text bg-dark">
                             <i class="fas fa-calendar-day"></i>
                         </div>
                     </x-slot>
                 </x-adminlte-date-range>

                 <x-adminlte-date-range name="tanggal_diterima" value="{{$gudang->tanggal_diterima ?? old('tanggal_diterima')}}" label="Tanggal Diterima" igroup-size="sm" :config="$config">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </x-slot>
                </x-adminlte-date-range>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Nomor Nota" name="nama_barang" value="{{$gudang->nama_barang ?? old('nama_barang')}}">
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Nomor Nota" name="quantity" value="{{$gudang->quantity ?? old('quantity')}}">
                        @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('gudang.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

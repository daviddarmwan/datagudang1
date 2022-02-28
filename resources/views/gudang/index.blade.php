@extends('adminlte::page')
@section('title', 'List Barang')
@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('gudang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Nota</th>
                            <th>Nama Supplier</th>
                            <th>Tanggal Order</th>
                            <th>Tanggal Diterima</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gudang as $key => $gudang)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$gudang->no_nota}}</td>
                                <td>{{$gudang->nama_supplier}}</td>
                                <td>{{$gudang->tanggal_order}}</td>
                                <td>{{$gudang->tanggal_diterima}}</td>
                                <td>{{$gudang->nama_barang}}</td>
                                <td>{{$gudang->quantity}}</td>
                                <td>
                                    <a href="{{route('gudang.edit', $gudang)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('gudang.destroy', $gudang)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush

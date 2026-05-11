@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if(!$us)
                <div class="alert alert-danger">Data tidak ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $supplier->supplier_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Supplier</th>
                        <td>{{ $supplier->supplier_kode }}</td>
                    </tr>
                    <tr>
                        <th>Nama Supplier</th>
                        <td>{{ $supplier->supplier_nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $supplier->supplier_alamat }}</td>
                    </tr>
                </table>
                <a href="{{ url('supplier') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ url('supplier/'.$supplier->supplier_id.'/edit') }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
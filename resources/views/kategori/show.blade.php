@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if(!$kategori)
                <div class="alert alert-danger">Data tidak ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $kategori->kategori_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Kategori</th>
                        <td>{{ $kategori->kategori_kode }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kategori</th>
                        <td>{{ $kategori->kategori_nama }}</td>
                    </tr>
                </table>
                <a href="{{ url('kategori') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ url('kategori/'.$kategori->kategori_id.'/edit') }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
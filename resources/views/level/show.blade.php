@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            {{-- Menggunakan @empty untuk mengecek data level --}}
            @empty($level)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.[cite: 7]
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Level</th>
                        <td>{{ $level->level_id }}</td>[cite: 7]
                    </tr>
                    <tr>
                        <th>Kode Level</th>
                        <td>{{ $level->level_kode }}</td>[cite: 7]
                    </tr>
                    <tr>
                        <th>Nama Level</th>
                        <td>{{ $level->level_nama }}</td>[cite: 7]
                    </tr>
                </table>
            @endempty {{-- Pastikan penutupnya @endempty karena pembukanya @empty --}}

            <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection